<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-4">Hello from Admin Dashboard</h3>
                @if (Sentinel::check())
                    <p>Welcome, {{ Sentinel::getUser()->first_name }}</p>
                @else
                    <p>Welcome, Guest</p>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Last Login</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usersWithRoles as $item)
                                <tr>
                                    <td>{{ $item['user']->first_name }}</td>
                                    <td>{{ $item['user']->last_name }}</td>
                                    <td>{{ $item['user']->last_login }}</td>
                                    <td>{{ $item['roles'] != [] ? implode(', ', $item['roles']) : 'No role assigned' }}</td>
                                    <td>
                                        @foreach ($allRoles as $role)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="selectedRole"
                                                    value="{{ $role->slug }}">
                                                <label class="form-check-label">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                        <a href="javascript:void(0);" onclick="updateRole({{ $item['user']->id }})"
                                            class="btn btn-warning mt-2">Update Role</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script>
        function updateRole(userId) {
            var selectedRole = document.querySelector('input[name="selectedRole"]:checked');
            if (selectedRole) {
                var slug = selectedRole.value;
                window.location.href = "{{ route('admin.role.update', ['id' => ':id', 'slug' => ':slug']) }}"
                    .replace(':id', userId).replace(':slug', slug);
            } else {
                alert("Please select a role.");
            }
        }
    </script>
</body>

</html>
