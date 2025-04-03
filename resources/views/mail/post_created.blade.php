<!DOCTYPE html>
<html>
<head>
    <title>New Post Created</title>
</head>
<body>
    <p>Hello,</p>
    <p> New post has been published on website {{ $post->website->name }}</p>
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->description }}</p>
</body>
</html>