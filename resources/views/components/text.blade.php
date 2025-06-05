@props(['id', 'name', 'placeholder' => 'Input text here', 'type' => 'text', 'value' => '', 'required' => false])

<div class="mb-4">
    <input
        id="{{$id}}" type="{{$type}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{old($name, $value)}}" {{$required ? 'required' : ''}}
         class="w-full px-4 py-2 border rounded focus:outline-none @error($name) border-red-500 @enderror"
    />
    @error($name)
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
    @enderror
</div>