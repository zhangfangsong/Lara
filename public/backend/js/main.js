
$(function (){
	// 图片上传
	$('.J-ajax-upload').each(function (index,element){

		var id = $(element).data('id');
		var num = $(element).data('num');

		var uploader = WebUploader.create({
	        // 选完文件后，是否自动上传。
	        auto: true,

	        // swf文件路径
	        swf: Lara.ImgUploadSwf,

	        // 文件接收服务端。
	        server: Lara.ImgUploadUrl,

	        // 选择文件的按钮。可选。
	        pick: '.J-ajax-upload',

	        accept: {
	            title: 'Images',
	            extensions: 'gif,jpg,jpeg,bmp,png',
	            mimeTypes: 'image/*'
	        }
	    });

		uploader.on('uploadSuccess', function (file, data){
            if(data.status == 0){
                if(num == 'one'){
                	var html = '<li><img src="'+data.url+'" alt=""><input name="'+ id +'" type="hidden" value="'+data.url+'"/></li>';
                	$('.upload-wraper').html(html);
                }else{
                	var html = '<li><img src="'+data.url+'" alt=""><input name="'+ id + '[]' +'" type="hidden" value="'+data.url+'"/></li>';
                	$('.upload-wraper').append(html);
                }
            }
        });
	});

	$('.upload-wraper').on('click', 'li', function (){
        $(this).remove();
    });

});

