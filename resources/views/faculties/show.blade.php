<x-layout title="Faculty: {{ $faculty->name }}">
    
    <table class="table" style="max-width: 500px">
        <thead><tr></tr></thead>
        <tbody> 
            <tr>
                <td>ID</td>
                <td>{{ $faculty->id }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $faculty->name }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{ $faculty->address }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $faculty->phone }}</td>
            </tr>
        </tbody>
        <tfoot><tr></tr></tfoot>
    </table>
    <a class="btn btn-outline-secondary" href="/faculties">Back</a>
    <a class="btn btn-primary" href="/faculties/{{ $faculty->id }}/edit">Edit</a>
    <form action="/faculties/{{ $faculty->id }}" method="POST" id="delete-form">
        @method('DELETE')
         @csrf
        <input class="btn btn-danger" type="button" value="Delete" onclick="showModal()">
    </form>

    <div class="modal fade" id="delete-confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this faculty
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
      </div>
    </div>
  </div>
</div>
</x-layout>