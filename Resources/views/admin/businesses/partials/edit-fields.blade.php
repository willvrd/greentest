<div class="box-body">

    {{Form::i18nInput('title','Title',$errors,$lang,$business)}}
    {{Form::i18nInput('slug','Slug',$errors,$lang,$business)}}
    {{Form::i18nInput('summary','Summary',$errors,$lang,$business)}}
    {{Form::i18nTextarea('description','Description',$errors,$lang,$business)}}
    
</div>
