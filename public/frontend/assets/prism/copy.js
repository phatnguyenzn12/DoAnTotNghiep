
// al pre tags on the page
const pres = document.getElementsByTagName("pre");

// reformat html of pre tags
if (pres !== null) {
  for (let i = 0; i < pres.length; i++) {
    // check if its a pre tag with a prism class
    if (isPrismClass(pres[i])) {
      // insert code and copy element
      pres[
        i
      ].innerHTML = `<div class="copy">copy</div><code class="${pres[i].className}">${pres[i].innerHTML}</code>`;
    }
  }
}


// create clipboard for every copy element
navigator.clipboard.writeText(document.querySelector('code').innerHTML);

// do stuff when copy is clicked
document.querySelector('.copy').onclick = (event) => {
  event.target.textContent = "copied!";
  setTimeout(() => {
    event.target.textContent = "copy";
  }, 2000);
};


// helper function
function isPrismClass(preTag) {
  return preTag.className.substring(0, 8) === "language";
}
