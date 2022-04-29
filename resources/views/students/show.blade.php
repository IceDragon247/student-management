<x-layout title="Student: {{ $student->lastName.' '.$student->firstName}}">
    
    <table class="table" style="max-width: 500px">
        <thead><tr></tr></thead>
        <tbody> 
            <tr>
                <td>ID</td>
                <td>{{ $student->id }}</td>
            </tr>
            <tr>
                <td>Last name</td>
                <td>{{ $student->lastName }}</td>
            </tr>
            <tr>
                <td>First name</td>
                <td>{{ $student->firstName }}</td>
            </tr>
            <tr>
                <td>Date of birth</td>
                <td>{{ $student->dob }}</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>{{ $student->gender }}</td>
            </tr>
            <tr>
                <td>Batch</td>
                <td>{{ $student->batch->name }}</td>
            </tr>
            <tr>
                <td>Faculty</td>
                <td>{{ $student->batch->faculty->name }}</td>
            </tr>
        </tbody>
        <tfoot><tr></tr></tfoot>
    </table>
    <a class="btn btn-outline-secondary" href="/students">Back</a>
    <a class="btn btn-primary" href="/students/{{ $student->id }}/edit">Edit</a>
    <form action="/students/{{ $student->id }}" method="POST" id="delete-form">
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
        Are you sure you want to delete this student
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
      </div>
    </div>
  </div>
</div>
</x-layout>
