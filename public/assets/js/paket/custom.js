JsBarcode("#bcd-1234567890", "1234567890", {
    width: 4
});
document.querySelectorAll('.bcd-item').forEach(function(element) {
    element.setAttribute('width', '100%');
    element.removeAttribute('height');
});