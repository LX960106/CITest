<html>
<head>
    <script src="<?php echo base_url('lixian.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('ajaxfileupload.js');?>"></script>

</head>
<body>
<p>
    <input id="img" type="file" size="45" name="img" class="input">
    <button class="button" id="buttonUpload" onclick="return ajaxFileUpload();">Upload</button>
</p>
<script type="text/javascript">
    function ajaxFileUpload()
    {
        alert("aaa");
        $.ajaxFileUpload
        (
            {
                url:'http://localhost/CodeIgniter-3.0.6/index.php/My/lixian', //你处理上传文件的服务端
                secureuri:false,
                fileElementId:'img',
                dataType: 'json',
                success: function (data)
                {
                    alert(data.index);
                }
            }
        )
        return false;
    }
</script>

</body>
</html>