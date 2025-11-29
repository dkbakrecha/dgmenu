<form action="{{ $route }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    {{-- Title --}}
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $recipe->title ?? '') }}" required>

        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" name="slug"
            class="form-control @error('slug') is-invalid @enderror"
            value="{{ old('slug', $recipe->slug ?? '') }}" required>

        @error('slug') <div class="text-danger">{{ $message }}</div> @enderror
    </div>


    {{-- Description --}}
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea id="descriptionEditor" name="description"
            class="form-control @error('description') is-invalid @enderror"
            rows="3" required>{{ old('description', $recipe->description ?? '') }}</textarea>

        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>


    {{-- Ingredients --}}
    <div class="mb-3">
        <label class="form-label">Ingredients</label>
        <textarea id="ingredientsEditor" name="ingredients"
            class="form-control @error('ingredients') is-invalid @enderror"
            rows="4" required>{{ old('ingredients', $recipe->ingredients ?? '') }}</textarea>

        @error('ingredients') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    {{-- Steps --}}
    <div class="mb-3">
        <label class="form-label">Steps</label>
        <textarea id="stepsEditor" name="steps"
            class="form-control @error('steps') is-invalid @enderror"
            rows="4" required>{{ old('steps', $recipe->steps ?? '') }}</textarea>

        @error('steps') <div class="text-danger">{{ $message }}</div> @enderror
    </div>


    {{-- Category Dropdown --}}
    <div class="mb-3">
        <label class="form-label">Category</label>
       <select name="category_id" class="form-control" required>
    <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @if(old('category_id', $recipe->category_id ?? null) == $cat->id) selected @endif>

                        {{ $cat->name }}
                     </option>
                @endforeach
        </select>


        @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    {{-- Tags Multi Select --}}
    <div class="mb-3">
        <label class="form-label">Tags</label>
        <select name="tags[]" class="form-control" multiple>

            @foreach($tags as $tag)
                <option value="{{ $tag->id }}"
                    @if(isset($recipe) && $recipe->tags->contains($tag->id)) selected @endif>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>

        @error('tags') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    {{-- Image Upload --}}
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">

        @if(isset($recipe) && $recipe->image)
            <div class="mt-3">
                <img id="imagePreview" src="{{ asset('storage/'.$recipe->image) }}" height="120">
            </div>
        @else
            <img id="imagePreview" height="120" style="display:none;">
        @endif
    </div>

    <button class="btn btn-success">{{ $buttonText }}</button>

</form>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const image = document.getElementById('imagePreview');
        image.src = reader.result;
        image.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
<script>
ClassicEditor
    .create(document.querySelector('#descriptionEditor'))
    .catch(error => { console.error(error); });

ClassicEditor
    .create(document.querySelector('#stepsEditor'))
    .catch(error => { console.error(error); });

ClassicEditor
    .create(document.querySelector('#ingredientsEditor'))
    .catch(error => { console.error(error); });
</script>
