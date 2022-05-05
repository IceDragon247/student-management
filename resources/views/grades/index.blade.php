<x-layout title="All grades">
    <a class="btn btn-primary" href="/grades/add">Add new grade</a>
    <table class="table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Subject ID</th>
                <th>First grade</th>
                <th>Second grade</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->student_id }}</td>
                    <td>{{ $grade->subject_id }}</td>
                    <td>{{ $grade->firstGrade }}</td>
                    <td>{{ $grade->secondGrade }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="/grades/{{$grade->student_id}}/{{$grade->subject_id}}">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>