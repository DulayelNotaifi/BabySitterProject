var kids_info = document.getElementById('kids_info');
var add_more_fields = document.getElementById('add_more_fields');
var remove_fields = document.getElementById('remove_fields');

add_more_fields.onclick = function(){
  var nameField = document.createElement('input');
  var ageField = document.createElement('input');

  nameField.setAttribute('type','text');
  nameField.setAttribute('name','kidsname[]');
  nameField.setAttribute('class','inputExtraName');
  nameField.setAttribute('size',50);
  nameField.setAttribute('placeholder','Enter Kid/s name');
  kids_info.appendChild(nameField);


  ageField.setAttribute('type','number');
  ageField.setAttribute('name','kidsage[]');
  ageField.setAttribute('class','inputExtraAge');
  ageField.setAttribute('size',50);
  ageField.setAttribute('placeholder','Enter Kid/s age');
  ageField.setAttribute('min',0);
  ageField.setAttribute('max',17);
  kids_info.appendChild(ageField);



}

remove_fields.onclick = function(){
  var input_tags = kids_info.getElementsByTagName('input');
  if(input_tags.length > 2) {
    kids_info.removeChild(input_tags[(input_tags.length) - 1]);
    kids_info.removeChild(input_tags[(input_tags.length) - 1]);

    
  }
}

