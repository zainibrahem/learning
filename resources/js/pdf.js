// Load the PDF using PDF.js
import * as fabric from 'fabric';
import * as pdfjsLib from 'pdfjs-dist';

// Initialize Fabric.js canvas
const canvas = new fabric.Canvas('drawing-canvas');

// Load the PDF using PDF.js
const url = '{{asset("storage/files/fRFTOhUvoC1yfyWhE6wGyfjdXKzuDDRwgdUjbnvB.pdf")}}'; // Replace with the path to your PDF file

pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.worker.min.js';

pdfjsLib.getDocument(url).promise.then((pdf) => {
    pdf.getPage(1).then((page) => {
        const scale = 1;
        const viewport = page.getViewport({ scale });

        const canvasElement = document.createElement('canvas');
        const context = canvasElement.getContext('2d');
        canvasElement.width = viewport.width;
        canvasElement.height = viewport.height;

        page.render({ canvasContext: context, viewport }).promise.then(() => {
            const pdfImage = new fabric.Image(canvasElement, {
                left: 0,
                top: 0,
                width: viewport.width,
                height: viewport.height,
                selectable: false
            });

            canvas.add(pdfImage);
            canvas.renderAll();
        });
    });
});