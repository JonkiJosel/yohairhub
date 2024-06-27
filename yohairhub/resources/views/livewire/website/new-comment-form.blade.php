<div id="commentForm" class="comment-form-wrap pt-5">
    <h3 class="mb-5">Leave a comment</h3>
    <form action="{{ route('website.salon.newComment', ['uuid' => $salon->uuid]) }}" method="post" class="p-5 bg-light">
        @csrf
        @if (session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="name">Name *</label>
            <input name="name" type="text" class="form-control" id="name">
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input name="email" type="email" class="form-control" id="email">
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
            @error('message')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn py-3 px-4 btn-primary">Post Comment</button>
        </div>
    </form>
</div>
