@extends('admin.layouts.layouts')
@section('content')
<style>
 
    .relative{
        position: relative;
        width: 100%;
        top:10%;
    }
    #pdf-container {
        position: relative;
        width: 100%;
        height: 800px;
    }

    #drawing-container {
        position: absolute;
        top: 60px;
        left: 0;
    }

    #toolbar-container {
        position: relative;
        z-index: 111;
        margin-top: 10px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding-bottom: 40px;
    }
    .iq-navbar-header{
        display: none !important;
    }
    #toolbar-container button {
        margin-right: 5px;
    }
    #page-select{
        width: 30%;
    }
</style>
    <div class="relative">
        <div id="toolbar-container">
            <label for="page-select">Select Page:</label>
            <select class="form-control" id="page-select"></select>
            <button class="btn btn-primary" id="toggle-drawing-mode">Toggle Drawing Mode</button>
            <button class="btn btn-primary" id="clear-canvas">Clear Drawing</button>
            <button class="btn btn-primary" id="previous-page">Previous</button>
            <button class="btn btn-primary" id="next-page">Next</button>
        </div>
        <div id="pdf-container"></div>
        <div id="drawing-container"></div>
    </div>
    <script>
        const stage = new Konva.Stage({
            container: 'drawing-container',
            width: window.innerWidth,
            height: window.innerHeight - 60 // Adjust the height to accommodate the toolbar
        });

        const layer = new Konva.Layer();
        stage.add(layer);

        const url = '{{asset($file->path)}}'; // Replace with the path to your PDF file

        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';

        const pageSelect = document.getElementById('page-select');
        const previousPageButton = document.getElementById('previous-page');
        const nextPageButton = document.getElementById('next-page');
        let currentPage = 1;
        let totalPages = 0;
        const drawings = {}; // Object to store drawings for each page

        pdfjsLib.getDocument(url).promise.then((pdf) => {
            totalPages = pdf.numPages;

            for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
                const option = document.createElement('option');
                option.value = pageNum;
                option.text = `Page ${pageNum}`;
                pageSelect.appendChild(option);
                // Initialize empty array for each page to store drawings
                drawings[pageNum] = [];
            }

            loadPage(currentPage);

            pageSelect.addEventListener('change', () => {
                const selectedPage = parseInt(pageSelect.value);
                currentPage = selectedPage;
                loadPage(selectedPage);
            });

            previousPageButton.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    loadPage(currentPage);
                }
            });

            nextPageButton.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    loadPage(currentPage);
                }
            });
        });

        let isDrawingMode = false;
        let drawingType = 'pen';
        let drawing;
        let hyperlink;

        const toggleDrawingModeButton = document.getElementById('toggle-drawing-mode');
        toggleDrawingModeButton.addEventListener('click', () => {
            isDrawingMode = !isDrawingMode;

            if (isDrawingMode) {
                toggleDrawingModeButton.textContent = 'Disable Drawing Mode';
                stage.container().style.cursor = 'crosshair';
            } else {
                toggleDrawingModeButton.textContent = 'Enable Drawing Mode';
                stage.container().style.cursor = 'default';
            }
        });

        const setDrawingType = (type) => {
            drawingType = type;
        };

        stage.on('mousedown touchstart', () => {
            if (isDrawingMode) {
                const pos = stage.getPointerPosition();
                if (pos) {
                    if (drawingType === 'hyperlink') {
                        const linkText = 'Click here to visit OpenAI';
                        const linkUrl = 'https://openai.com';
                        hyperlink = new Konva.Text({
                            text: linkText,
                            fontSize: 14,
                            fontFamily: 'Arial',
                            fill: 'blue',
                            x: pos.x,
                            y: pos.y,
                            draggable: true
                        });
                        hyperlink.setAttr('url', linkUrl);
                        hyperlink.on('click tap', () => {
                            window.open(linkUrl, '_blank');
                        });

                        layer.add(hyperlink);
                        stage.batchDraw();
                    } else {
                        drawing = {
                            type: drawingType,
                            points: [pos.x, pos.y],
                            color: 'black',
                            width: 2
                        };
                    }
                }
            }
        });

        stage.on('mousemove touchmove', () => {
            if (!isDrawingMode) {
                return;
            }

            const pos = stage.getPointerPosition();
            if (drawing && pos) {
                drawing.points = drawing.points.concat([pos.x, pos.y]);

                if (drawingType === 'pen') {
                    const line = new Konva.Line({
                        points: drawing.points,
                        stroke: drawing.color,
                        strokeWidth: drawing.width,
                        lineCap: 'round',
                        lineJoin: 'round'
                    });

                    layer.add(line);
                    stage.batchDraw();
                } else if (drawingType === 'eraser') {
                    const shape = new Konva.Rect({
                        x: pos.x - drawing.width / 2,
                        y: pos.y - drawing.width / 2,
                        width: drawing.width,
                        height: drawing.width,
                        fill: 'white',
                        globalCompositeOperation: 'destination-out'
                    });

                    layer.add(shape);
                    stage.batchDraw();
                }
            }
        });

        stage.on('mouseup touchend', () => {
            if (isDrawingMode) {
                if (drawing) {
                    const savedDrawings = drawings[currentPage];
                    savedDrawings.push(drawing);
                    drawing = null;
                }
            }
        });

        const clearCanvasButton = document.getElementById('clear-canvas');
        clearCanvasButton.addEventListener('click', () => {
            layer.destroyChildren();
            stage.batchDraw();
        });

        


        function loadPage(pageNum) {
            const pageIndex = pageNum; // Adjust for zero-based indexing

            layer.destroyChildren();
            stage.batchDraw();

            pdfjsLib.getDocument(url).promise.then((pdf) => {
                pdf.getPage(pageIndex).then((page) => {
                    const scale = 1;
                    const viewport = page.getViewport({ scale });

                    const canvasElement = document.createElement('canvas');
                    const context = canvasElement.getContext('2d');
                    canvasElement.width = viewport.width;
                    canvasElement.height = viewport.height;

                    page.render({ canvasContext: context, viewport }).promise.then(() => {
                        const pdfContainer = document.getElementById('pdf-container');
                        pdfContainer.innerHTML = '';
                        pdfContainer.appendChild(canvasElement);

                        const pdfImage = new Konva.Image({
                            image: canvasElement,
                            x: 0,
                            y: 0,
                            width: viewport.width,
                            height: viewport.height
                        });

                        layer.add(pdfImage);

                        // Draw saved drawings on the current page
                        console.log(currentPage)
                        console.log(drawings)
                        const savedDrawings = drawings[currentPage];
                        savedDrawings.forEach((drawing) => {
                            if (drawing.type === 'pen') {
                                const line = new Konva.Line({
                                    points: drawing.points,
                                    stroke: drawing.color,
                                    strokeWidth: drawing.width,
                                    lineCap: 'round',
                                    lineJoin: 'round'
                                });

                                layer.add(line);
                            } else if (drawing.type === 'eraser') {
                                const shape = new Konva.Rect({
                                    x: drawing.points[0] - drawing.width / 2,
                                    y: drawing.points[1] - drawing.width / 2,
                                    width: drawing.width,
                                    height: drawing.width,
                                    fill: 'white',
                                    globalCompositeOperation: 'destination-out'
                                });

                                layer.add(shape);
                            }
                        });

                        stage.batchDraw();
                    });
                });
            });
        }
      
    </script>
@endsection
