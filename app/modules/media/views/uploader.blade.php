{{ Form::open(array("url" => "admin/media/create", "files" => "true", "id" => "fileupload" )) }}
    <div class="section">
        <div class="media-upload js-upload">
            <div class="media-upload-drag-drop">
                <div class="media-upload__title">
                    <h3 class="h4">
                        Drop files here
                        <span>or</span>
                    </h3>
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="mt-7px btn btn-default btn-sm fileinput-button">
                        <span>Select Files</span>
                        <input type="file" name="files[]" multiple>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="section section--offset">
        <div class="fileupload-buttons fileupload-buttonbar">
            <button type="submit" class="btn btn-default mr-5px start">
                <i class="fa fa-upload mr-5px"></i>
                <span>Start upload</span>
            </button>

             <button type="reset" class="btn btn-default mr-5px cancel">
                <i class="glyphicon glyphicon-ban-circle"></i>
                <span>Cancel upload</span>
            </button>
        </div>
    </div>
    <div class="section section--offset">
        <table role="presentation" class="table table-pretty table-striped table-hover border-top"><tbody class="files"></tbody></table>
    </div>

{{ Form::close() }}

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
     
        <td style="width: 40%">
            <p class="size">Processing...</p>
            <div class="progress progress-tiny progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            <div class="mt-7px flow-right">
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-default btn-sm mr-5px start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-default btn-sm cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
            </div>
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" class="media-thumbnail--small"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
    </tr>
{% } %}
</script>
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/main.js') }}"></script>
                            


