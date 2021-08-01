<div class="form-group">
    <label for="inputSlug" class="form-label">Символьный код</label>
    <input type="text" class="form-control" id="inputSlug" placeholder="Введите символьный код"
           name="slug"
           value="{{ old('slug', $article->slug ?? null) }}"
    >
</div>
<div class="form-group">
    <label for="inputTitle" class="form-label">Название статьи</label>
    <input type="text" class="form-control" id="inputTitle" placeholder="Введите название статьи"
           name="title"
           value="{{ old('title', $article->title ?? null) }}"
    >
</div>
<div class="form-group">
    <label for="inputPreview" class="form-label">Краткое описание</label>
    <input type="text" class="form-control" id="inputPreview" placeholder="Введите краткое описание"
           name="preview"
           value="{{ old('preview', $article->preview ?? null) }}"
    >
</div>
<div class="form-group">
    <label for="inputBody" class="form-label">Описание статьи</label>
    <input type="text" class="form-control" id="inputBody" placeholder="Введите описание"
           name="body"
           value="{{ old('body', $article->body ?? null) }}"
    >
</div>
<div class="mb-3 form-check">
    <label class="form-check-label" for="checkPublished">Опубликовано</label>
    <input type="checkbox" class="form-check-input" id="checkPublished"
           name="published"
           @if (old('published') == 'on' || (isset($article->published) && $article->published))
               checked
           @endif
    >
</div>
<div class="form-group">
    <label for="inputTags" class="form-label">Теги</label>
    <input type="text" class="form-control" id="inputTags" placeholder="Введите теги"
           name="tags"
           @if (isset($article))
                value="{{
                    old('tags', $article->tags->pluck('name')->implode(','))
                }}"
           @endif
    >
</div>

<button type="submit" class="btn btn-primary">{{ isset($article) ? 'Изменить' : 'Создать' }} статью</button>
