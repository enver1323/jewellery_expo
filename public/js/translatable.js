/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/helpers/mainHelper.js":
/*!********************************************!*\
  !*** ./resources/js/helpers/mainHelper.js ***!
  \********************************************/
/*! exports provided: setAttributes, classIncludes */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setAttributes", function() { return setAttributes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "classIncludes", function() { return classIncludes; });
String.prototype.capitalize = function () {
  return this.charAt(0).toUpperCase() + this.slice(1);
};

function setAttributes(elem, attrs) {
  for (var key in attrs) {
    elem.setAttribute(key, attrs[key]);
  }
}
function classIncludes(domElem, className) {
  return domElem.getAttribute('class').includes(className);
}

/***/ }),

/***/ "./resources/js/models/translatable.js":
/*!*********************************************!*\
  !*** ./resources/js/models/translatable.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers/mainHelper */ "./resources/js/helpers/mainHelper.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var Translatable =
/*#__PURE__*/
function () {
  function Translatable(name, parentId, languages) {
    var inputType = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : "input";

    _classCallCheck(this, Translatable);

    this.setVars(name, parentId, languages, inputType);
    this.initSelect();
  }

  _createClass(Translatable, [{
    key: "setVars",
    value: function setVars(name, parentId, languages, inputType) {
      this.name = name;
      this.inputType = inputType;
      this.container = document.getElementById(parentId);
      this.languages = languages;
      this.entries = {};
    }
  }, {
    key: "setEntries",
    value: function setEntries(entries) {
      for (var k in entries) {
        this.addEntryField(k, entries[k]);
      }
    }
  }, {
    key: "initSelect",
    value: function initSelect() {
      var selectContainer = document.createElement('div');
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](selectContainer, {
        'class': 'form-group row d-flex align-items-end'
      });
      var div = document.createElement('div');
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](div, {
        'class': 'col-lg-8'
      });
      selectContainer.appendChild(div);
      var label = document.createElement('label');
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](label, {
        'for': "".concat(this.name, "Select"),
        'class': 'col-form-label'
      });
      label.innerHTML = "Choose language to add ".concat(this.name, " entry");
      div.appendChild(label);
      this.select = document.createElement('select');
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](this.select, {
        'class': 'form-control',
        'id': "".concat(this.name, "Select")
      });
      div.appendChild(this.select);
      var option;

      for (var k in this.languages) {
        option = document.createElement('option');
        _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](option, {
          'value': this.languages[k].code
        });
        option.innerHTML = this.languages[k].name;
        this.select.appendChild(option);
      }

      div = document.createElement('div');
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](div, {
        'class': 'col-lg-4'
      });
      selectContainer.appendChild(div);
      var addingBtn = document.createElement('button');
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](addingBtn, {
        'class': 'btn btn-primary btn-block addingBtn',
        'id': "adding".concat(this.name.capitalize(), "Btn"),
        'type': 'button'
      });
      addingBtn.innerHTML = 'Add translations';
      addingBtn.addEventListener('click', this);
      div.appendChild(addingBtn);
      this.container.appendChild(selectContainer);
    }
  }, {
    key: "handleEvent",
    value: function handleEvent(event) {
      this['on' + event.type](event);
    }
  }, {
    key: "onclick",
    value: function onclick(event) {
      var target = event.target;
      if (_helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["classIncludes"](target, 'addingBtn')) this.addEntries(target);
      if (_helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["classIncludes"](target, 'deletingBtn')) this.removeEntryField(target);
    }
  }, {
    key: "addEntries",
    value: function addEntries(button) {
      var option = this.select.options[this.select.selectedIndex];
      if (this.isEntryNotCreated(option)) this.addEntryField(option.value);
    }
  }, {
    key: "addEntryField",
    value: function addEntryField(language) {
      var value = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
      var div = document.createElement('div');
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](div, {
        'class': 'form-group d-flex'
      });
      var inputContainer = document.createElement('div');
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](inputContainer, {
        'class': 'flex-grow-1'
      });
      div.appendChild(inputContainer);
      var label = document.createElement('label');
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](label, {
        'for': "".concat(language).concat(this.name.capitalize()),
        'class': 'col-form-label'
      });
      label.innerHTML = language.capitalize() + " language " + this.name;
      inputContainer.appendChild(label);
      var input = document.createElement(this.inputType);
      var inputId = "".concat(language).concat(this.name.capitalize());
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](input, {
        'class': 'form-control',
        'id': inputId,
        'type': 'text',
        'value': value,
        'name': "".concat(this.name, "[").concat(language, "]"),
        'required': ''
      });
      this.entries[language] = input;
      input.innerHTML = value;
      inputContainer.appendChild(input);
      var deleteBtn = document.createElement('button');
      _helpers_mainHelper__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](deleteBtn, {
        'class': 'btn btn-danger ml-2 mt-auto deletingBtn',
        'id': "".concat(language).concat(this.name.capitalize(), "DeletingBtn"),
        'type': 'button'
      });
      deleteBtn.innerHTML = "&times;";
      deleteBtn.addEventListener('click', this);
      div.appendChild(deleteBtn);
      this.container.appendChild(div);
      this.container.insertBefore(div, this.select.parentNode.parentNode);
      if (this.inputType === 'textarea') CKEDITOR.replace(inputId);
    }
  }, {
    key: "removeEntryField",
    value: function removeEntryField(entry) {
      var lang = entry.id.substr(0, 2);
      delete this.entries[lang];
      var group = entry.parentNode;
      group.parentNode.removeChild(group);
    }
  }, {
    key: "isEntryNotCreated",
    value: function isEntryNotCreated(option) {
      if (option === undefined) return false;
      return this.entries[option.value] === undefined;
    }
  }]);

  return Translatable;
}();

/* harmony default export */ __webpack_exports__["default"] = (Translatable);
window.Translatable = Translatable;

/***/ }),

/***/ 3:
/*!***************************************************!*\
  !*** multi ./resources/js/models/translatable.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Projects\php\jewellery_expo\resources\js\models\translatable.js */"./resources/js/models/translatable.js");


/***/ })

/******/ });