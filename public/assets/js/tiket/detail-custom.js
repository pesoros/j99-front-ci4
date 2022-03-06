JsBarcode("#bcd-BA749211", "BA749211", {
    width: 4
});
document.querySelectorAll('.bcd-item').forEach(function(element) {
    element.setAttribute('width', '100%');
    element.removeAttribute('height');
});