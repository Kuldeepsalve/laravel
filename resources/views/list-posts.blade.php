<table>
    <thead>
        <th>UserId</th>
        <th>ID</th>
        <th>Title</th>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->userId}}</td>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
            </tr>
        @endforeach
    </tbody>
</table>