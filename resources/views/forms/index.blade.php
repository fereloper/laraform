<table class="table">
    <thead>
    <tr>
    <td>Form Title</td>
    <td>Created Time</td>
    </tr>
    </thead>

    <tbody>
    @foreach($forms as $form)
    <tr>
        <td>{{ $form->name }}</td>
        <td>{{ $form->created_at }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
