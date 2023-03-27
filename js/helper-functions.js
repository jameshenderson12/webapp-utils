/********************************/
//  File: myfunctions.js 
//  By:   James Henderson
//  Date: 24/03/2022
//  A utility JS file to contain
//  reusable helper functions...
/*******************************/

function loadPage(pageURL) {
  // Simple function to load/reload a page with a specified URL
	window.location.href = pageURL;
}

function containsWhitespace(str) {
// Simple function to return 'true' if string contains space or 'false' otherwise
  return /\s/.test(str);
}
