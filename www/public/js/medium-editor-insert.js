/*!
* medium-editor-insert-plugin v0.1.1 - jQuery insert plugin for MediumEditor
*
* https://github.com/orthes/medium-editor-images-plugin
*
* Copyright (c) 2013 Pavel Linkesch (http://linkesch.sk)
* Released under the MIT license
*/

!function(a){MediumEditor.prototype.serialize=function(){var b,c,d,e,f,g,h,i,j={};for(b=0;b<this.elements.length;b+=1){for(d=""!==this.elements[b].id?this.elements[b].id:"element-"+b,e=a(this.elements[b]).clone(),f=a(".mediumInsert",e),c=0;c<f.length;c++)g=a(f[c]),h=a(".mediumInsert-placeholder",g).children(),0===h.length?g.remove():(g.removeAttr("contenteditable"),a("img[draggable]",g).removeAttr("draggable"),g.hasClass("small")&&h.addClass("small"),a(".mediumInsert-buttons",g).remove(),h.unwrap());i=e.html().trim(),j[d]={value:i}}return j},MediumEditor.prototype.deactivate=function(){var b;if(this.isActive){for(this.isActive=!1,void 0!==this.toolbar&&(this.toolbar.style.display="none"),document.documentElement.removeEventListener("mouseup",this.checkSelectionWrapper),b=0;b<this.elements.length;b+=1)this.elements[b].removeEventListener("keyup",this.checkSelectionWrapper),this.elements[b].removeEventListener("blur",this.checkSelectionWrapper),this.elements[b].removeAttribute("contentEditable");a.fn.mediumInsert.insert.$el.mediumInsert("disable")}},MediumEditor.prototype.activate=function(){var b;if(!this.isActive){for(void 0!==this.toolbar&&(this.toolbar.style.display="block"),this.isActive=!0,b=0;b<this.elements.length;b+=1)this.elements[b].setAttribute("contentEditable",!0);this.bindSelect(),a.fn.mediumInsert.insert.$el.mediumInsert("enable")}},a.fn.mediumInsert=function(b){return"string"==typeof b&&a.fn.mediumInsert.insert[b]?(a.fn.mediumInsert.insert[b](),void 0):(a.fn.mediumInsert.settings=a.extend(a.fn.mediumInsert.settings,b),this.each(function(){a("p",this).bind("dragover drop",function(a){return a.preventDefault(),!1}),a.fn.mediumInsert.insert.init(a(this)),a.fn.mediumInsert.settings.images===!0&&a.fn.mediumInsert.images.init(),a.fn.mediumInsert.settings.maps===!0&&a.fn.mediumInsert.maps.init()}))},a.fn.mediumInsert.settings={imagesUploadScript:"upload.php",enabled:!0,images:!0,maps:!1},a.fn.mediumInsert.insert={init:function(a){this.$el=a,this.setPlaceholders(),this.setEvents()},deselect:function(){document.getSelection().removeAllRanges()},disable:function(){a.fn.mediumInsert.settings.enabled=!1,a.fn.mediumInsert.insert.$el.find(".mediumInsert-buttons").addClass("hide")},enable:function(){a.fn.mediumInsert.settings.enabled=!0,a.fn.mediumInsert.insert.$el.find(".mediumInsert-buttons").removeClass("hide")},setPlaceholders:function(){var b=a.fn.mediumInsert.insert.$el,c="",d='<a class="mediumInsert-action action-images-add">Image</a>',e='<a class="mediumInsert-action action-maps-add">Map</a>';a.fn.mediumInsert.settings.images===!0&&a.fn.mediumInsert.settings.maps===!0?c='<a class="mediumInsert-buttonsShow">Insert</a><ul class="mediumInsert-buttonsOptions"><li>'+d+"</li><li>"+e+"</li></ul>":a.fn.mediumInsert.settings.images===!0?c=d:a.fn.mediumInsert.settings.maps===!0&&(c=e),""!==c&&(c='<div class="mediumInsert" contenteditable="false"><div class="mediumInsert-buttons"><div class="mediumInsert-buttonsIcon">&rarr;</div>'+c+'</div><div class="mediumInsert-placeholder"></div></div>',b.is(":empty")&&b.html("<p><br></p>"),b.keyup(function(){var d=0;b.children("p").each(function(){a(this).next().hasClass("mediumInsert")===!1&&(a(this).after(c),a(this).next(".mediumInsert").attr("id","mediumInsert-"+d)),d++})}).keyup())},setEvents:function(){var b=this,c=a.fn.mediumInsert.insert.$el;c.on("selectstart",".mediumInsert",function(a){return a.preventDefault(),!1}),c.on("blur",function(){var b,c=a(this).clone();c.find(".mediumInsert").remove(),b=c.html().replace(/^\s+|\s+$/g,""),(""===b||"<p><br></p>"===b)&&a(this).addClass("medium-editor-placeholder")}),c.on("click",".mediumInsert-buttons a.mediumInsert-buttonsShow",function(){var c=a(this).siblings(".mediumInsert-buttonsOptions"),d=a(this).parent().siblings(".mediumInsert-placeholder");a(this).hasClass("active")?(a(this).removeClass("active"),c.hide(),a("a",c).show()):(a(this).addClass("active"),c.show(),a("a",c).each(function(){var b=a(this).attr("class").split("action-")[1],e=b.split("-")[0];a(".mediumInsert-"+e,d).length>0&&a("a:not(.action-"+b+")",c).hide()})),b.deselect()}),c.on("mouseleave",".mediumInsert",function(){a("a.mediumInsert-buttonsShow",this).removeClass("active"),a(".mediumInsert-buttonsOptions",this).hide()}),c.on("click",".mediumInsert-buttons .mediumInsert-action",function(){var b=a(this).attr("class").split("action-")[1].split("-"),c=a(this).parents(".mediumInsert-buttons").siblings(".mediumInsert-placeholder");a.fn.mediumInsert[b[0]]&&a.fn.mediumInsert[b[0]][b[1]]&&a.fn.mediumInsert[b[0]][b[1]](c),a(this).parents(".mediumInsert").mouseleave()})}}}(jQuery),function(a){a.fn.mediumInsert.images={init:function(){this.$el=a.fn.mediumInsert.insert.$el,this.options=a.extend(this.default,a.fn.mediumInsert.settings.imagesPlugin),this.setImageEvents(),this.setDragAndDropEvents(),this.preparePreviousImages()},"default":{formatData:function(a){var b=new FormData;return b.append("file",a),b}},preparePreviousImages:function(){this.$el.find(".mediumInsert-images").each(function(){var b=a(this).parent();b.html('<div class="mediumInsert-placeholder" draggable="true">'+b.html()+"</div>")})},add:function(b){var c,d,e=this;return c=a('<input type="file">').click(),c.change(function(){d=this.files,e.uploadFiles(b,d)}),a.fn.mediumInsert.insert.deselect(),c},updateProgressBar:function(b){var c,d=a(".progress:first",this.$el);b.lengthComputable&&(c=b.loaded/b.total*100|0,d.attr("value",c),d.html(c))},uploadCompleted:function(b){var c,d=a(".progress:first",this.$el);d.attr("value",100),d.html(100),d.before('<div class="mediumInsert-images"><img src="'+b.responseText+'" draggable="true" alt=""></div>'),c=d.siblings("img"),d.remove(),c.load(function(){c.parent().mouseleave().mouseenter()})},uploadFiles:function(b,c){for(var d={"image/png":!0,"image/jpeg":!0,"image/gif":!0},e=this,f=function(){var a=new XMLHttpRequest;return a.upload.onprogress=e.updateProgressBar,a},g=0;g<c.length;g++){var h=c[g];d[h.type]===!0&&(b.append('<progress class="progress" min="0" max="100" value="0">0</progress>'),a.ajax({type:"post",url:a.fn.mediumInsert.settings.imagesUploadScript,xhr:f,cache:!1,contentType:!1,complete:this.uploadCompleted,processData:!1,data:this.options.formatData(h)}))}},setImageEvents:function(){this.$el.on("mouseenter",".mediumInsert-images",function(){var b,c,d=a("img",this);a.fn.mediumInsert.settings.enabled!==!1&&d.length>0&&(a(this).append('<a class="mediumInsert-imageRemove"></a>'),a(this).parent().parent().hasClass("small")?a(this).append('<a class="mediumInsert-imageResizeBigger"></a>'):a(this).append('<a class="mediumInsert-imageResizeSmaller"></a>'),b=d.position().top+parseInt(d.css("margin-top"),10),c=d.position().left+d.width()-30,a(".mediumInsert-imageRemove",this).css({right:"auto",top:b,left:c}),a(".mediumInsert-imageResizeBigger, .mediumInsert-imageResizeSmaller",this).css({right:"auto",top:b,left:c-31}))}),this.$el.on("mouseleave",".mediumInsert-images",function(){a(".mediumInsert-imageRemove, .mediumInsert-imageResizeSmaller, .mediumInsert-imageResizeBigger",this).remove()}),this.$el.on("click",".mediumInsert-imageResizeSmaller",function(){a(this).parent().parent().parent().addClass("small"),a(this).parent().mouseleave().mouseleave(),a.fn.mediumInsert.insert.deselect()}),this.$el.on("click",".mediumInsert-imageResizeBigger",function(){a(this).parent().parent().parent().removeClass("small"),a(this).parent().mouseleave().mouseleave(),a.fn.mediumInsert.insert.deselect()}),this.$el.on("click",".mediumInsert-imageRemove",function(){0===a(this).parent().siblings().length&&a(this).parent().parent().parent().removeClass("small"),a(this).parent().remove(),a.fn.mediumInsert.insert.deselect()})},setDragAndDropEvents:function(){var b,c,d=this,e=!1,f=!1;a(document).on("dragover","body",function(){a.fn.mediumInsert.settings.enabled!==!1&&a(this).addClass("hover")}),a(document).on("dragend","body",function(){a.fn.mediumInsert.settings.enabled!==!1&&a(this).removeClass("hover")}),this.$el.on("dragover",".mediumInsert",function(){a.fn.mediumInsert.settings.enabled!==!1&&(a(this).addClass("hover"),a(this).attr("contenteditable",!0))}),this.$el.on("dragleave",".mediumInsert",function(){a.fn.mediumInsert.settings.enabled!==!1&&(a(this).removeClass("hover"),a(this).attr("contenteditable",!1))}),this.$el.on("dragstart",".mediumInsert .mediumInsert-images img",function(){a.fn.mediumInsert.settings.enabled!==!1&&(b=a(this).parent().index(),c=a(this).parent().parent().parent().attr("id"))}),this.$el.on("dragend",".mediumInsert .mediumInsert-images img",function(b){a.fn.mediumInsert.settings.enabled!==!1&&e===!0&&(0===a(b.originalEvent.target.parentNode).siblings().length&&a(b.originalEvent.target.parentNode).parent().parent().removeClass("small"),a(b.originalEvent.target.parentNode).mouseleave(),a(b.originalEvent.target.parentNode).remove(),e=!1,f=!1)}),this.$el.on("dragover",".mediumInsert .mediumInsert-images img",function(b){a.fn.mediumInsert.settings.enabled!==!1&&b.preventDefault()}),this.$el.on("drop",".mediumInsert .mediumInsert-images img",function(){var d,e,g;if(a.fn.mediumInsert.settings.enabled!==!1){if(c!==a(this).parent().parent().parent().attr("id"))return f=!1,b=c=null,void 0;d=parseInt(b,10),e=a(this).parent().parent().find(".mediumInsert-images:nth-child("+(d+1)+")"),g=a(this).parent().index(),g>d?e.insertAfter(a(this).parent()):d>g&&e.insertBefore(a(this).parent()),e.mouseleave(),f=!0,b=null}}),this.$el.on("drop",".mediumInsert",function(b){var c;b.preventDefault(),a.fn.mediumInsert.settings.enabled!==!1&&(a(this).removeClass("hover"),a("body").removeClass("hover"),a(this).attr("contenteditable",!1),c=b.originalEvent.dataTransfer.files,c.length>0?d.uploadFiles(a(".mediumInsert-placeholder",this),c):f===!0?f=!1:(a(".mediumInsert-placeholder",this).append('<div class="mediumInsert-images">'+b.originalEvent.dataTransfer.getData("text/html")+"</div>"),a("meta",this).remove(),e=!0))})}}}(jQuery),function(a){a.fn.mediumInsert.maps={init:function(){this.$el=a.fn.mediumInsert.insert.$el},add:function(b){a.fn.mediumInsert.insert.deselect(),b.append('<div class="mediumInsert-maps">Map - Coming soon...</div>')}}}(jQuery);