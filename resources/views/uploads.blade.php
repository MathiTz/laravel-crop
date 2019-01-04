<!DOCTYPE html>
<html>
<head>
    <title>cropit</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="/js/cropit.js"></script>

    <style>
    .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
    }

    .cropit-preview-image-container {
        cursor: move;
    }

    .image-size-label {
        margin-top: 10px;
    }

    input {
        display: block;
    }

    button[type="submit"] {
        margin-top: 10px;
    }

    #result {
        margin-top: 10px;
        width: 900px;
    }

    #result-data {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-wrap: break-word;
    }
    </style>
</head>
<body>
    <form action="/uploads" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="image-editor">
        <input type="file" class="cropit-image-input">
        <div class="cropit-preview"></div>
        <div class="image-size-label">
        Resize image
        </div>
        <input type="range" class="cropit-image-zoom-input">
        <input type="hidden" name="image-data" class="hidden-image-data" />
    </div>

    <div class="second-image-editor">
        <input type="file" class="cropit-image-input">
        <div class="cropit-preview"></div>
        <div class="image-size-label">
        Resize image
        </div>
        <input type="range" class="cropit-image-zoom-input">
        <input type="hidden" name="second-image-data" class="second-hidden-image-data" />
        <button type="submit">Submit</button>
    </div>
    </form>

    <div id="result">
    <code>$form.serialize() =</code>
    <code id="result-data"></code>
    </div>

    <script>
    $(function() {
        $('.image-editor').cropit({'minZoo':2});
        $('.second-image-editor').cropit({'minZoo':2});

        $('form').submit(function() {
        // Move cropped image data to hidden input
        var imageData = $('.image-editor').cropit('export');
        var imageData2 = $('.image-editor').cropit('export');
        $('.hidden-image-data').val(imageData);
        $('.second-hidden-image-data').val(imageData2);

        // Print HTTP request params
        var formValue = $(this).serialize();
        $('#result-data').text(formValue);

        // Prevent the form from actually submitting
        return true;
        });
    });
    </script>
</body>
</html>
