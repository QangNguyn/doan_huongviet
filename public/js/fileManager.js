//Laravel file manager

var options = {
    filebrowserImageBrowseUrl: "/laravel-filemanager?type=Images",
    filebrowserImageUploadUrl: "/laravel-filemanager/upload?type=Images&_token=",
    filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
    filebrowserUploadUrl: "/laravel-filemanager/upload?type=Files&_token=",
};
CKEDITOR.replace("my-editor", options);

$("#lfm").filemanager("image");
var route_prefix = "url-to-filemanager";