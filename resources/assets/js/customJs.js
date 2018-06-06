
let codePin = "";
var addPinCode = (e) => {
  let tmpNumber = e.target.id.slice(-1);
  if (codePin.length < 4) {
    codePin += tmpNumber;
    $("#pin-input").val(codePin);
  }
}

var removePin = () => {
  if (codePin.length > 0) {
    codePin = codePin.slice(0, -1);
    $("#pin-input").val(codePin);
  }
}


$("#pin-1, #pin-2, #pin-3, #pin-4, #pin-5, #pin-6, #pin-7, #pin-8, #pin-9")
  .click(addPinCode);

$("#pin-back")
  .click(removePin);
