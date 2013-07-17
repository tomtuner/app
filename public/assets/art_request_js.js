/*
	Masked Input plugin for jQuery
	Copyright (c) 2007-2011 Josh Bush (digitalbush.com)
	Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license) 
	Version: 1.3
*/
(function(a){var b=(a.browser.msie?"paste":"input")+".mask",c=window.orientation!=undefined;a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},dataName:"rawMaskFn"},a.fn.extend({caret:function(a,b){if(this.length!=0){if(typeof a=="number"){b=typeof b=="number"?b:a;return this.each(function(){if(this.setSelectionRange)this.setSelectionRange(a,b);else if(this.createTextRange){var c=this.createTextRange();c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select()}})}if(this[0].setSelectionRange)a=this[0].selectionStart,b=this[0].selectionEnd;else if(document.selection&&document.selection.createRange){var c=document.selection.createRange();a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length}return{begin:a,end:b}}},unmask:function(){return this.trigger("unmask")},mask:function(d,e){if(!d&&this.length>0){var f=a(this[0]);return f.data(a.mask.dataName)()}e=a.extend({placeholder:"_",completed:null},e);var g=a.mask.definitions,h=[],i=d.length,j=null,k=d.length;a.each(d.split(""),function(a,b){b=="?"?(k--,i=a):g[b]?(h.push(new RegExp(g[b])),j==null&&(j=h.length-1)):h.push(null)});return this.trigger("unmask").each(function(){function v(a){var b=f.val(),c=-1;for(var d=0,g=0;d<k;d++)if(h[d]){l[d]=e.placeholder;while(g++<b.length){var m=b.charAt(g-1);if(h[d].test(m)){l[d]=m,c=d;break}}if(g>b.length)break}else l[d]==b.charAt(g)&&d!=i&&(g++,c=d);if(!a&&c+1<i)f.val(""),t(0,k);else if(a||c+1>=i)u(),a||f.val(f.val().substring(0,c+1));return i?d:j}function u(){return f.val(l.join("")).val()}function t(a,b){for(var c=a;c<b&&c<k;c++)h[c]&&(l[c]=e.placeholder)}function s(a){var b=a.which,c=f.caret();if(a.ctrlKey||a.altKey||a.metaKey||b<32)return!0;if(b){c.end-c.begin!=0&&(t(c.begin,c.end),p(c.begin,c.end-1));var d=n(c.begin-1);if(d<k){var g=String.fromCharCode(b);if(h[d].test(g)){q(d),l[d]=g,u();var i=n(d);f.caret(i),e.completed&&i>=k&&e.completed.call(f)}}return!1}}function r(a){var b=a.which;if(b==8||b==46||c&&b==127){var d=f.caret(),e=d.begin,g=d.end;g-e==0&&(e=b!=46?o(e):g=n(e-1),g=b==46?n(g):g),t(e,g),p(e,g-1);return!1}if(b==27){f.val(m),f.caret(0,v());return!1}}function q(a){for(var b=a,c=e.placeholder;b<k;b++)if(h[b]){var d=n(b),f=l[b];l[b]=c;if(d<k&&h[d].test(f))c=f;else break}}function p(a,b){if(!(a<0)){for(var c=a,d=n(b);c<k;c++)if(h[c]){if(d<k&&h[c].test(l[d]))l[c]=l[d],l[d]=e.placeholder;else break;d=n(d)}u(),f.caret(Math.max(j,a))}}function o(a){while(--a>=0&&!h[a]);return a}function n(a){while(++a<=k&&!h[a]);return a}var f=a(this),l=a.map(d.split(""),function(a,b){if(a!="?")return g[a]?e.placeholder:a}),m=f.val();f.data(a.mask.dataName,function(){return a.map(l,function(a,b){return h[b]&&a!=e.placeholder?a:null}).join("")}),f.attr("readonly")||f.one("unmask",function(){f.unbind(".mask").removeData(a.mask.dataName)}).bind("focus.mask",function(){m=f.val();var b=v();u();var c=function(){b==d.length?f.caret(0,b):f.caret(b)};(a.browser.msie?c:function(){setTimeout(c,0)})()}).bind("blur.mask",function(){v(),f.val()!=m&&f.change()}).bind("keydown.mask",r).bind("keypress.mask",s).bind(b,function(){setTimeout(function(){f.caret(v(!0))},0)}),v()})}})})(jQuery)
!function(e){function o(t){var r=t.data("timepicker-settings"),i=t.data("timepicker-list");i&&i.length&&(i.remove(),t.data("timepicker-list",!1)),i=e("<ul />"),i.attr("tabindex",-1),i.addClass("ui-timepicker-list"),r.className&&i.addClass(r.className),i.css({display:"none",position:"absolute",zIndex:10001}),r.minTime!==null&&r.showDuration&&i.addClass("ui-timepicker-with-duration");var s=r.durationTime!==null?r.durationTime:r.minTime,o=r.minTime!==null?r.minTime:0,u=r.maxTime!==null?r.maxTime:o+n-1;u<=o&&(u+=n);for(var f=o;f<=u;f+=r.step*60){var l=f%n,d=e("<li />");d.data("time",l),d.text(p(l,r.timeFormat));if(r.minTime!==null&&r.showDuration){var v=e("<span />");v.addClass("ui-timepicker-duration"),v.text(" ("+h(f-s)+")"),d.append(v)}i.append(d)}i.data("timepicker-input",t),t.data("timepicker-list",i),e("body").append(i),a(t,i),i.delegate("li","click",{timepicker:t},function(n){t.addClass("ui-timepicker-hideme"),t[0].focus(),i.find("li").removeClass("ui-timepicker-selected"),e(this).addClass("ui-timepicker-selected"),c(t),i.hide()})}function u(t,n,r){if(!r&&r!==0)return!1;var i=t.data("timepicker-settings"),s=!1;return n.find("li").each(function(t,n){var o=e(n);if(Math.abs(o.data("time")-r)<=i.step*30)return s=o,!1}),s}function a(e,t){var n=d(e.val()),r=u(e,t,n);r&&r.addClass("ui-timepicker-selected")}function f(){if(this.value=="")return;var t=e(this),n=p(d(this.value),t.data("timepicker-settings").timeFormat);t.val(n)}function l(t){var n=e(this),r=n.data("timepicker-list");if(!r.is(":visible")){if(t.keyCode!=40)return!0;n.focus()}switch(t.keyCode){case 13:return c(n),s.hide.apply(this),t.preventDefault(),!1;case 38:var i=r.find(".ui-timepicker-selected");if(!i.length){var i;r.children().each(function(t,n){if(e(n).position().top>0)return i=e(n),!1}),i.addClass("ui-timepicker-selected")}else i.is(":first-child")||(i.removeClass("ui-timepicker-selected"),i.prev().addClass("ui-timepicker-selected"),i.prev().position().top<i.outerHeight()&&r.scrollTop(r.scrollTop()-i.outerHeight()));break;case 40:var i=r.find(".ui-timepicker-selected");if(i.length==0){var i;r.children().each(function(t,n){if(e(n).position().top>0)return i=e(n),!1}),i.addClass("ui-timepicker-selected")}else i.is(":last-child")||(i.removeClass("ui-timepicker-selected"),i.next().addClass("ui-timepicker-selected"),i.next().position().top+2*i.outerHeight()>r.outerHeight()&&r.scrollTop(r.scrollTop()+i.outerHeight()));break;case 27:r.find("li").removeClass("ui-timepicker-selected"),r.hide();break;case 9:case 16:case 17:case 18:case 19:case 20:case 33:case 34:case 35:case 36:case 37:case 39:case 45:return;default:r.find("li").removeClass("ui-timepicker-selected");return}}function c(e){var t=e.data("timepicker-settings"),n=e.data("timepicker-list"),r=null,i=n.find(".ui-timepicker-selected");if(i.length)var r=i.data("time");else if(e.val()){var r=d(e.val());a(e,n)}if(r!==null){var s=p(r,t.timeFormat);e.attr("value",s)}e.trigger("change").trigger("changeTime")}function h(e){var t=Math.round(e/60),n;if(t<60)n=[t,i.mins];else if(t==60)n=["1",i.hr];else{var r=(t/60).toFixed(1);i.decimal!="."&&(r=r.replace(".",i.decimal)),n=[r,i.hrs]}return n.join(" ")}function p(e,n){var r=new Date(t.valueOf()+e*1e3),i="";for(var s=0;s<n.length;s++){var o=n.charAt(s);switch(o){case"a":i+=r.getHours()>11?"pm":"am";break;case"A":i+=r.getHours()>11?"PM":"AM";break;case"g":var u=r.getHours()%12;i+=u==0?"12":u;break;case"G":i+=r.getHours();break;case"h":var u=r.getHours()%12;u!=0&&u<10&&(u="0"+u),i+=u==0?"12":u;break;case"H":var u=r.getHours();i+=u>9?u:"0"+u;break;case"i":var a=r.getMinutes();i+=a>9?a:"0"+a;break;case"s":var e=r.getSeconds();i+=e>9?e:"0"+e;break;default:i+=o}}return i}function d(e){if(e=="")return null;if(e+0==e)return e;typeof e=="object"&&(e=e.getHours()+":"+e.getMinutes());var t=new Date(0),n=e.toLowerCase().match(/(\d+)(?::(\d\d))?\s*([pa]?)/);if(!n)return null;var r=parseInt(n[1]*1);if(n[3])if(r==12)var i=n[3]=="p"?12:0;else var i=r+(n[3]=="p"?12:0);else var i=r;var s=n[2]*1||0;return i*3600+s*60}var t=new Date;t.setHours(0),t.setMinutes(0),t.setSeconds(0);var n=86400,r={className:null,minTime:null,maxTime:null,durationTime:null,step:30,showDuration:!1,timeFormat:"g:ia",scrollDefaultNow:!1,scrollDefaultTime:!1,selectOnBlur:!1},i={decimal:".",mins:"mins",hr:"hr",hrs:"hrs"},s={init:function(t){return this.each(function(){var n=e(this);if(n[0].tagName=="SELECT"){var o=e("<input />"),u={type:"text",value:n.val()},a=n[0].attributes;for(var c=0;c<a.length;c++)u[a[c].nodeName]=a[c].nodeValue;o.attr(u),n.replaceWith(o),n=o}var h=e.extend({},r);t&&(h=e.extend(h,t)),h.minTime&&(h.minTime=d(h.minTime)),h.maxTime&&(h.maxTime=d(h.maxTime)),h.durationTime&&(h.durationTime=d(h.durationTime)),h.lang&&(i=e.extend(i,h.lang)),n.data("timepicker-settings",h),n.attr("autocomplete","off"),n.click(s.show).focus(s.show).blur(f).keydown(l),n.addClass("ui-timepicker-input");if(n.val()){var v=p(d(n.val()),h.timeFormat);n.val(v)}e("body").attr("tabindex",-1).focusin(function(t){e(t.target).closest(".ui-timepicker-input").length==0&&e(t.target).closest(".ui-timepicker-list").length==0&&s.hide()})})},show:function(t){var n=e(this),r=n.data("timepicker-list");if(!r||r.length==0)o(n),r=n.data("timepicker-list");if(n.hasClass("ui-timepicker-hideme")){n.removeClass("ui-timepicker-hideme"),r.hide();return}if(r.is(":visible"))return;s.hide();var i=parseInt(n.css("marginTop").slice(0,-2));n.offset().top+n.outerHeight(!0)+r.outerHeight()>e(window).height()+e(window).scrollTop()?r.css({top:n.offset().top+i-r.outerHeight()}):r.css({top:n.offset().top+i+n.outerHeight()}),r.css("left",n.offset().left),r.show();var a=n.data("timepicker-settings"),f=r.find(".ui-timepicker-selected");f.length||(n.val()?f=u(n,r,d(n.val())):a.minTime===null&&a.scrollDefaultNow?f=u(n,r,d(new Date)):a.scrollDefaultTime!==!1&&(f=u(n,r,d(a.scrollDefaultTime))));if(f&&f.length){var l=r.scrollTop()+f.position().top-f.outerHeight();r.scrollTop(l)}else r.scrollTop(0);n.trigger("showTimepicker")},hide:function(t){e(".ui-timepicker-list:visible").each(function(){var t=e(this),n=t.data("timepicker-input"),r=n.data("timepicker-settings");r.selectOnBlur&&c(n),t.hide(),n.trigger("hideTimepicker")})},option:function(t,n){var r=e(this),i=r.data("timepicker-settings"),s=r.data("timepicker-list");if(typeof t=="object")i=e.extend(i,t);else if(typeof t=="string"&&typeof n!="undefined")i[t]=n;else if(typeof t=="string")return i[t];i.minTime&&(i.minTime=d(i.minTime)),i.maxTime&&(i.maxTime=d(i.maxTime)),i.durationTime&&(i.durationTime=d(i.durationTime)),r.data("timepicker-settings",i),s&&(s.remove(),r.data("timepicker-list",!1))},getSecondsFromMidnight:function(){return d(e(this).val())},getTime:function(){return new Date(t.valueOf()+d(e(this).val())*1e3)},setTime:function(t){var n=e(this),r=p(d(t),n.data("timepicker-settings").timeFormat);n.val(r)}};e.fn.timepicker=function(t){if(s[t])return s[t].apply(this,Array.prototype.slice.call(arguments,1));if(typeof t=="object"||!t)return s.init.apply(this,arguments);e.error("Method "+t+" does not exist on jQuery.timepicker")}}(jQuery)
/**
 * bootbox.js v2.4.2
 *
 * http://bootboxjs.com/license.txt
 */
var bootbox=window.bootbox||function(k){function g(b,a){null==a&&(a=l);return"string"==typeof j[a][b]?j[a][b]:a!=m?g(b,m):b}var l="en",m="en",r=!0,q="static",h={},f={},j={en:{OK:"OK",CANCEL:"Cancel",CONFIRM:"OK"},fr:{OK:"OK",CANCEL:"Annuler",CONFIRM:"D'accord"},de:{OK:"OK",CANCEL:"Abbrechen",CONFIRM:"Akzeptieren"},es:{OK:"OK",CANCEL:"Cancelar",CONFIRM:"Aceptar"},br:{OK:"OK",CANCEL:"Cancelar",CONFIRM:"Sim"},nl:{OK:"OK",CANCEL:"Annuleren",CONFIRM:"Accepteren"},ru:{OK:"OK",CANCEL:"\u041e\u0442\u043c\u0435\u043d\u0430",
CONFIRM:"\u041f\u0440\u0438\u043c\u0435\u043d\u0438\u0442\u044c"},it:{OK:"OK",CANCEL:"Annulla",CONFIRM:"Conferma"}};f.setLocale=function(b){for(var a in j)if(a==b){l=b;return}throw Error("Invalid locale: "+b);};f.addLocale=function(b,a){"undefined"==typeof j[b]&&(j[b]={});for(var c in a)j[b][c]=a[c]};f.setIcons=function(b){h=b;if("object"!==typeof h||null==h)h={}};f.alert=function(){var b="",a=g("OK"),c=null;switch(arguments.length){case 1:b=arguments[0];break;case 2:b=arguments[0];"function"==typeof arguments[1]?
c=arguments[1]:a=arguments[1];break;case 3:b=arguments[0];a=arguments[1];c=arguments[2];break;default:throw Error("Incorrect number of arguments: expected 1-3");}return f.dialog(b,{label:a,icon:h.OK,callback:c},{onEscape:c})};f.confirm=function(){var b="",a=g("CANCEL"),c=g("CONFIRM"),e=null;switch(arguments.length){case 1:b=arguments[0];break;case 2:b=arguments[0];"function"==typeof arguments[1]?e=arguments[1]:a=arguments[1];break;case 3:b=arguments[0];a=arguments[1];"function"==typeof arguments[2]?
e=arguments[2]:c=arguments[2];break;case 4:b=arguments[0];a=arguments[1];c=arguments[2];e=arguments[3];break;default:throw Error("Incorrect number of arguments: expected 1-4");}return f.dialog(b,[{label:a,icon:h.CANCEL,callback:function(){"function"==typeof e&&e(!1)}},{label:c,icon:h.CONFIRM,callback:function(){"function"==typeof e&&e(!0)}}])};f.prompt=function(){var b="",a=g("CANCEL"),c=g("CONFIRM"),e=null,s="";switch(arguments.length){case 1:b=arguments[0];break;case 2:b=arguments[0];"function"==
typeof arguments[1]?e=arguments[1]:a=arguments[1];break;case 3:b=arguments[0];a=arguments[1];"function"==typeof arguments[2]?e=arguments[2]:c=arguments[2];break;case 4:b=arguments[0];a=arguments[1];c=arguments[2];e=arguments[3];break;case 5:b=arguments[0];a=arguments[1];c=arguments[2];e=arguments[3];s=arguments[4];break;default:throw Error("Incorrect number of arguments: expected 1-5");}var n=k("<form></form>");n.append("<input autocomplete=off type=text value='"+s+"' />");var d=f.dialog(n,[{label:a,
icon:h.CANCEL,callback:function(){"function"==typeof e&&e(null)}},{label:c,icon:h.CONFIRM,callback:function(){"function"==typeof e&&e(n.find("input[type=text]").val())}}],{header:b});d.on("shown",function(){n.find("input[type=text]").focus();n.on("submit",function(a){a.preventDefault();d.find(".btn-primary").click()})});return d};f.modal=function(){var b,a,c,e={onEscape:null,keyboard:!0,backdrop:q};switch(arguments.length){case 1:b=arguments[0];break;case 2:b=arguments[0];"object"==typeof arguments[1]?
c=arguments[1]:a=arguments[1];break;case 3:b=arguments[0];a=arguments[1];c=arguments[2];break;default:throw Error("Incorrect number of arguments: expected 1-3");}e.header=a;c="object"==typeof c?k.extend(e,c):e;return f.dialog(b,[],c)};f.dialog=function(b,a,c){var e=null,f="",h=[],c=c||{};null==a?a=[]:"undefined"==typeof a.length&&(a=[a]);for(var d=a.length;d--;){var g=null,j=null,l="",m=null;if("undefined"==typeof a[d].label&&"undefined"==typeof a[d]["class"]&&"undefined"==typeof a[d].callback){var g=
0,t=null,p;for(p in a[d])if(t=p,1<++g)break;1==g&&"function"==typeof a[d][p]&&(a[d].label=t,a[d].callback=a[d][p])}"function"==typeof a[d].callback&&(m=a[d].callback);a[d]["class"]?j=a[d]["class"]:d==a.length-1&&2>=a.length&&(j="btn-primary");g=a[d].label?a[d].label:"Option "+(d+1);a[d].icon&&(l="<i class='"+a[d].icon+"'></i> ");f+="<a data-handler='"+d+"' class='btn "+j+"' href='javascript:;'>"+l+""+g+"</a>";h[d]=m}a=["<div class='bootbox modal' style='overflow:hidden;'>"];if(c.header){d="";if("undefined"==
typeof c.headerCloseButton||c.headerCloseButton)d="<a href='javascript:;' class='close'>&times;</a>";a.push("<div class='modal-header'>"+d+"<h3>"+c.header+"</h3></div>")}a.push("<div class='modal-body'></div>");f&&a.push("<div class='modal-footer'>"+f+"</div>");a.push("</div>");var i=k(a.join("\n"));("undefined"===typeof c.animate?r:c.animate)&&i.addClass("fade");k(".modal-body",i).html(b);i.bind("hidden",function(){i.remove()});i.bind("hide",function(){if("escape"==e&&"function"==typeof c.onEscape)c.onEscape()});
k(document).bind("keyup.modal",function(a){27==a.which&&(e="escape")});i.bind("shown",function(){k("a.btn-primary:last",i).focus()});i.on("click",".modal-footer a, a.close",function(a){var b=k(this).data("handler"),b=h[b],c=null;"function"==typeof b&&(c=b());!1!==c&&(a.preventDefault(),e="button",i.modal("hide"))});null==c.keyboard&&(c.keyboard="function"==typeof c.onEscape);k("body").append(i);i.modal({backdrop:"undefined"===typeof c.backdrop?q:c.backdrop,keyboard:c.keyboard});return i};f.hideAll=
function(){k(".bootbox").modal("hide")};f.animate=function(b){r=b};f.backdrop=function(b){q=b};return f}(window.jQuery);

/**
* Bootstrap.js by @mdo and @fat, extended by @ArnoldDaniels.
* plugins: bootstrap-fileupload.js
* Copyright 2012 Twitter, Inc.
* http://www.apache.org/licenses/LICENSE-2.0.txt
*/
!function(a){var b=function(b,c){this.$element=a(b),this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file"),this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||c.name,this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),this.$hidden.length===0&&(this.$hidden=a('<input type="hidden" />'),this.$element.prepend(this.$hidden)),this.$preview=this.$element.find(".fileupload-preview");var d=this.$preview.css("height");this.$preview.css("display")!="inline"&&d!="0px"&&d!="none"&&this.$preview.css("line-height",d),this.original={exists:this.$element.hasClass("fileupload-exists"),preview:this.$preview.html(),hiddenVal:this.$hidden.val()},this.$remove=this.$element.find('[data-dismiss="fileupload"]'),this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",a.proxy(this.trigger,this)),this.listen()};b.prototype={listen:function(){this.$input.on("change.fileupload",a.proxy(this.change,this)),a(this.$input[0].form).on("reset.fileupload",a.proxy(this.reset,this)),this.$remove&&this.$remove.on("click.fileupload",a.proxy(this.clear,this))},change:function(a,b){var c=a.target.files!==undefined?a.target.files[0]:a.target.value?{name:a.target.value.replace(/^.+\\/,"")}:null;if(b==="clear")return;if(!c){this.clear();return}this.$hidden.val(""),this.$hidden.attr("name",""),this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof c.type!="undefined"?c.type.match("image.*"):c.name.match("\\.(gif|png|jpe?g)$"))&&typeof FileReader!="undefined"){var d=new FileReader,e=this.$preview,f=this.$element;d.onload=function(a){e.html('<img src="'+a.target.result+'" '+(e.css("max-height")!="none"?'style="max-height: '+e.css("max-height")+';"':"")+" />"),f.addClass("fileupload-exists").removeClass("fileupload-new")},d.readAsDataURL(c)}else this.$preview.text(c.name),this.$element.addClass("fileupload-exists").removeClass("fileupload-new")},clear:function(b){this.$hidden.val(""),this.$hidden.attr("name",this.name),this.$input.attr("name","");if(a.browser.msie){var c=this.$input.clone(!0);this.$input.after(c),this.$input.remove(),this.$input=c}else this.$input.val("");this.$preview.html(""),this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),b&&(this.$input.trigger("change",["clear"]),b.preventDefault())},reset:function(a){this.clear(),this.$hidden.val(this.original.hiddenVal),this.$preview.html(this.original.preview),this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")},trigger:function(a){this.$input.trigger("click"),a.preventDefault()}},a.fn.fileupload=function(c){return this.each(function(){var d=a(this),e=d.data("fileupload");e||d.data("fileupload",e=new b(this,c)),typeof c=="string"&&e[c]()})},a.fn.fileupload.Constructor=b,a(function(){a("body").on("click.fileupload.data-api",'[data-provides="fileupload"]',function(b){var c=a(this);if(c.data("fileupload"))return;c.fileupload(c.data());var d=a(b.target).is("[data-dismiss=fileupload],[data-trigger=fileupload]")?a(b.target):a(b.target).parents("[data-dismiss=fileupload],[data-trigger=fileupload]").first();d.length>0&&(d.trigger("click.fileupload"),b.preventDefault())})})}(window.jQuery)
$(document).ready(function(){

    $("#phone_number").mask("(999) 999-9999");
    
    $("#request_due_date").datepicker({
        'minDate': '+14'
    });

    $("#event_start_date").datepicker({
        'minDate': '+14'
    });

    $("#event_end_date").datepicker({
        'minDate': '+14'
    });
    
    $('#event_start_time').timepicker({
        'step': '15'
    });
    $('#event_end_time').timepicker({
        'step': '15'
    });
    
    $("#add_file_attachment").click(function(){
        $(".file-attachment-row").last().after($(".file-attachment-row").first().clone().show());
        $("#remove_file_attachment").show();
    });
        
    $("#remove_file_attachment").hide();

    $(".file-attachment-row").last().after($(".file-attachment-row").first().clone());

    $(".file-attachment-row").first().hide();
    
    $(document).on('click', "#remove_file_attachment", function(){
        $(".file-attachment-row").last().remove();
        if($(".file-attachment-row").size() == 2)
        {
           $("#remove_file_attachment").hide();
        }
        else
        {
           $("#remove_file_attachment").show();
        }
    });

    $("#Banner").change(function(){
       if($(this).is(':checked'))
       {
           $("#banner-request-container").show();
           $('#has_banner_request').val('true');
       }
       else
       {
           $("#banner-request-container").hide();
           $('#has_banner_request').val('false');
       }
    });

    $("#Flyer").change(function(){
       if($(this).is(':checked'))
       {
           $("#flyer-request-container").show();
           $('#has_flyer_request').val('true');
       }
       else
       {
           $("#flyer-request-container").hide();
           $('#has_flyer_request').val('false');
       }
    });

    $.validator.addMethod('atLeastOneChecked', function(value, element) {
        return ($(".checkbox-group:checked").length > 0);
    }, 'Please select at least one option.');
    
    $("#art_request_form").validate({
        rules: {
            'phone_number' : "required",
            'request_due_date' : {
                required: true,
                dpDate: true
            },
            'art_request_type[]' : {
                'atLeastOneChecked' : true
            },
            'event_title': "required",
            'event_location' : "required",
            'event_sponsor' : "required",
            'event_start_time' : "required",
            'event_end_time' : "required",
            'event_description' : {
                required: true,
                minlength: 10
            },
            'event_pricing_member' : {
                required: true,
                number: true
            },
            'event_pricing_student' : {
                required: true,
                number: true
            },
            'event_pricing_staff' : {
                required: true,
                number: true
            },
            'event_pricing_public' : {
                required: true,
                number: true
            },
            'request_description' : {
                required: true,
                minlength: 10            
            },
            'event_start_date': { 
                required: true, 
                dpDate: true,                
                dpCompareDate: {'notAfter' : '#event_end_date'}
            },
            'event_end_date': {
                required: true, 
                dpDate: true,                
                dpCompareDate: {'notBefore' : '#event_start_date'}
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("type") === "checkbox") 
            {
                error.insertAfter("div[class='checkbox-group-container']");
            }
            else{
            
                if(element.attr("type") === "file")
                {
                    error.insertAfter("div[class='input-append']");
                }
                else{
                    if(element.hasClass('textarea-validation') == true){
                        error.insertAfter($(element).next());
                    }
                    else
                    {
                        error.insertAfter(element);
                    }
                }
                
            }
        },
        highlight: function(label) {
            $(label).closest('.control-group').addClass('error');
        },
        success: function(label) {
            label.closest('.control-group').addClass('success');
        },  
        submitHandler: function(form) {
        	$(".file-attachment-row").first().remove();
            form.submit();
        }
    });
    
});