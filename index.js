var setClassName = function(c, i) {
  var elems = document.getElementsByClassName(c);
  for (var x = 0; x < elems.length; x++) {
    elems.item(x).removeChild(elems.item(x).firstChild);
    elems.item(x).appendChild(document.createTextNode(i));
  }
};

var calculate = function(fromStr, toStr) {
  var from = parseInt(fromStr, 10);
  var to = parseInt(toStr, 10);
  var deltaE     = -2.178e-18 * (1 / Math.pow(to, 2) - 1 / Math.pow(from, 2));
  var wavelength = Math.abs(1.9864458e-25 / deltaE);
  var nu         = Math.abs(deltaE / 6.62607004e-34);
  setClassName('delta-e', deltaE);
  setClassName('from', from);
  setClassName('nu', nu);
  setClassName('to', to);
  setClassName('wavelength', wavelength);
};
