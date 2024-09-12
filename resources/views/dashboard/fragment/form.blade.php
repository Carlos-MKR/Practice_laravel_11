@csrf

<label for="title">Title</label>
<input type="text" name="title" value="{{ old('title', $post->title) }}"><br>

<label for="slug">Slug</label>
<input type="text" name="slug" value="{{ old('slug', $post->slug) }}" ><br>

<label for="content">Content</label>
<textarea name="content" id="" cols="30" rows="10">{{ old('content', $post->content) }}</textarea><br>

<label for="category_id">Category</label>
<select name="category_id" id="">
    @foreach ($categories as $id => $title)
        <option value="{{ $id }}" {{ old('category_id', $post->category_id) == $id ? 'selected' : ''}} >{{ $title }}</option>
    @endforeach
</select><br>

<label for="description">Description</label>
<textarea name="description" id="" cols="30" rows="10">{{ old('description', $post->description) }}</textarea><br>

<label for="posted">Posted</label>
<select name="posted" id="">
    <option value="not" {{ old('posted', $post->posted) == 'not' ? 'selected' : ''}}>No</option>
    <option value="yes" {{ old('posted', $post->posted) == 'yes' ? 'selected' : ''}}>Yes</option>
</select><br>

@if (isset($task) && $task == 'edit')
    <label for="image">Image</label>
    <input type="file" name="image"><br>
@endif
