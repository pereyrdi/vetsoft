/************************************************************************************************************
Copyright (C) February 2006  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2010
Owner of DHTMLgoodies.com

************************************************************************************************************/
	
// Patterns
var formValidationMasks = new Array();
formValidationMasks['email'] = /\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/gi;	// Email
formValidationMasks['numeric'] = /^[0-9]+$/gi;	// Numeric
formValidationMasks['zip'] = /^[0-9]{5}\-[0-9]{4}$/gi;	// Numeric

var formElementArray = new Array();

/* These two event functions are from http://ejohn.org/apps/jselect/event.html */

function addEvent( obj, type, fn ) { 
  if ( obj.attachEvent ) { 
    obj['e'+type+fn] = fn; 
    obj[type+fn] = function(){obj['e'+type+fn]( window.event );} 
    obj.attachEvent( 'on'+type, obj[type+fn] ); 
  } else 
    obj.addEventListener( type, fn, false ); 
} 
function removeEvent( obj, type, fn ) { 
  if ( obj.detachEvent ) { 
    obj.detachEvent( 'on'+type, obj[type+fn] ); 
    obj[type+fn] = null; 
  } else 
    obj.removeEventListener( type, fn, false ); 
} 


function validateInput(e,inputObj)
{
	if(!inputObj)inputObj = this;		
	var inputValidates = true;
	
	if(formElementArray[inputObj.name]['required'] && inputObj.tagName=='INPUT' && inputObj.value.length==0)inputValidates = false;
	if(formElementArray[inputObj.name]['required'] && inputObj.tagName=='SELECT' && inputObj.selectedIndex==0){
		inputValidates = false;
	}
	if(formElementArray[inputObj.name]['mask'] && !inputObj.value.match(formValidationMasks[formElementArray[inputObj.name]['mask']]))inputValidates = false;

	if(formElementArray[inputObj.name]['freemask']){
		var tmpMask = formElementArray[inputObj.name]['freemask'];
		tmpMask = tmpMask.replace(/-/g,'\\-');
		tmpMask = tmpMask.replace(/S/g,'[A-Z]');
		tmpMask = tmpMask.replace(/N/g,'[0-9]');
		tmpMask = eval("/^" + tmpMask + "$/gi");
		if(!inputObj.value.match(tmpMask))inputValidates = false
	}	
	
	if(formElementArray[inputObj.name]['regexpPattern']){
		var tmpMask = eval(formElementArray[inputObj.name]['regexpPattern']);
		if(!inputObj.value.match(tmpMask))inputValidates = false
	}
	if(!formElementArray[inputObj.name]['required'] && inputObj.value.length==0 && inputObj.tagName=='INPUT')inputValidates = true;
	
	
	if(inputValidates){
		inputObj.parentNode.className='validInput';
	}else{
		inputObj.parentNode.className='invalidInput'
	}
}

function isFormValid()
{
	var divs = document.getElementsByTagName('DIV');
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='invalidInput')return false;
	}
	return true;	
}




function initFormValidation()
{
	var inputFields = document.getElementsByTagName('INPUT');
	var selectBoxes = document.getElementsByTagName('SELECT');
	
	var inputs = new Array();
	
	
	for(var no=0;no<inputFields.length;no++){
		inputs[inputs.length] = inputFields[no];
		
	}	
	for(var no=0;no<selectBoxes.length;no++){
		inputs[inputs.length] = selectBoxes[no];
		
	}
	
	for(var no=0;no<inputs.length;no++){
		var className = inputs[no].parentNode.className;
		if(className && className.indexOf('validInput')>=0)continue;			
		var required = inputs[no].getAttribute('required');
		if(!required)required = inputs[no].required;		
		
		var mask = inputs[no].getAttribute('mask');
		if(!mask)mask = inputs[no].mask;
		
		var freemask = inputs[no].getAttribute('freemask');
		if(!freemask)freemask = inputs[no].freemask;
		
		var regexpPattern = inputs[no].getAttribute('regexpPattern');
		if(!regexpPattern)regexpPattern = inputs[no].regexpPattern;
		
		var div = document.createElement('DIV');
		div.className = 'invalidInput';
		inputs[no].parentNode.insertBefore(div,inputs[no]);
		div.appendChild(inputs[no]);
		div.style.width = inputs[no].offsetWidth + 'px';
		
		addEvent(inputs[no],'blur',validateInput);
		addEvent(inputs[no],'change',validateInput);
		addEvent(inputs[no],'paste',validateInput);
		addEvent(inputs[no],'keyup',validateInput);
		
	
		formElementArray[inputs[no].name] = new Array();
		formElementArray[inputs[no].name]['mask'] = mask;
		formElementArray[inputs[no].name]['freemask'] = freemask;
		formElementArray[inputs[no].name]['required'] = required;
		formElementArray[inputs[no].name]['regexpPattern'] = regexpPattern;

		validateInput(false,inputs[no]);
			
	}	
}

window.onload = initFormValidation;
