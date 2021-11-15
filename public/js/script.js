  // Get the modal

  var modalparent = document.getElementsByClassName("modal_multi");

  // Get the button that opens the modal

  var modal_btn_multi = document.getElementsByClassName("myBtn_multi");

  // Get the <span> element that closes the modal
  var span_close_multi = document.getElementsByClassName("close_multi");

  // When the user clicks the button, open the modal
  function setDataIndex() {

      for (i = 0; i < modal_btn_multi.length; i++) {
          modal_btn_multi[i].setAttribute('data-index', i);
          modalparent[i].setAttribute('data-index', i);
          span_close_multi[i].setAttribute('data-index', i);
      }
  }



  for (i = 0; i < modal_btn_multi.length; i++) {
      modal_btn_multi[i].onclick = function () {
          var ElementIndex = this.getAttribute('data-index');
          modalparent[ElementIndex].style.display = "block";
      };

      // When the user clicks on <span> (x), close the modal
      span_close_multi[i].onclick = function () {
          var ElementIndex = this.getAttribute('data-index');
          modalparent[ElementIndex].style.display = "none";
      };

  }

  window.onload = function () {

      setDataIndex();
  };

  window.onclick = function (event) {
      if (event.target === modalparent[event.target.getAttribute('data-index')]) {
          modalparent[event.target.getAttribute('data-index')].style.display = "none";
      }


  };

//Auto complete


  // variables
  var input = document.querySelector('input');
  var people = document.getElementsByClassName('name');
  var results;



  // functions
  function autocomplete(val) {
      var people_return = [];

      for (i = 0; i < people.length; i++) {
          if (val === people[i].textContent.slice(0, val.length)) {
              people_return.push(people[i].textContent);
          }
      }

      return people_return;
  };

  // events
  input.onkeyup = function (e) {
      input_val = this.value; // updates the variable on each ocurrence

      if (input_val.length > 0) {
          var people_to_show = [];

          autocomplete_results = document.getElementById("autocomplete-results");
          autocomplete_results.innerHTML = '';
          people_to_show = autocomplete(input_val);

          for (i = 0; i < people_to_show.length; i++) {
              autocomplete_results.innerHTML += '<li>' + people_to_show[i] + '</li>';

          }
          autocomplete_results.style.display = 'block';
      } else {
          people_to_show = [];
          autocomplete_results.innerHTML = '';
      }
  };

  