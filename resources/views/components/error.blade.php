@error($name ?? '') 
<span class="error text-danger">
    {{ $message }}
</span> 
@enderror


<!--

$attributes->merge(['class' => 'alert alert-'.$type , 'data-controller' => $attributes->prepends('profile-controller')])

-->