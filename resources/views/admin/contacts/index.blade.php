@extends('admin.layouts.app')
@section('title') @lang('app.contacts') @endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="h3 mb-3">
                @lang('app.contacts')
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">@lang('app.id') <i class="ph ph-arrows-down-up"></i></th>
                        <th scope="col">@lang('app.info')</th>
                        <th scope="col">@lang('app.message')</th>
                        <th scope="col">@lang('app.isResponded')</th>
                        <th scope="col">@lang('app.others')</th>
                        <th scope="col"><i class="ph-fill ph-gear h5"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <th class="align-middle" scope="row">
                                {{ ($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration }}
                            </th>
                            <td class="align-middle">{{ $contact->id }}</td>
                            <td>
                                <table class="table table-striped table-hover table-bordered table-sm">
                                    <tr>
                                        <th>@lang('app.name')</th>
                                        <td>{{ $contact->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.city')</th>
                                        <td>{{ $contact->city ?: '-' }}</td>
                                    </tr>
                                </table>
                                <div>@lang('app.contact')</div>
                                <table class="table table-striped table-hover table-bordered table-sm">
                                    <tr>
                                        <th><i class="ph ph-envelope"></i></th>
                                        <td>{{ $contact->email }}</td>
                                    </tr>
                                    <tr>
                                        <th><i class="ph ph-phone"></i></th>
                                        <td>{{ $contact->phone_number ?: '-' }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <div class="text-break" style="max-width: 200px;">
                                    {{ Str::limit($contact->message, 350) }}
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input is-responded-checkbox" type="checkbox" 
                                           name="isResponded" role="switch" 
                                           id="isResponded-{{ $contact->id }}" 
                                           data-id="{{ $contact->id }}"
                                           {{ $contact->is_responded ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div>@lang('app.device')</div>
                                <table class="table table-striped table-hover table-bordered table-sm small">
                                    <tr>
                                        <th>@lang('app.ipAddress')</th>
                                        <td>{{ $contact->ip_address ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.userAgent')</th>
                                        <td>{{ Str::limit($contact->user_agent, 50) ?: '-' }}</td>
                                    </tr>
                                </table>
                                <table class="table table-striped table-hover table-bordered table-sm small text-secondary">
                                    <tr>
                                        <th>@lang('app.createdBy')</th>
                                        <td class="text-secondary">{{ $contact->created_by ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.createdAt')</th>
                                        <td class="text-secondary">{{ $contact->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.updatedAt')</th>
                                        <td class="text-secondary">{{ $contact->updated_at->format('d M Y H:i') }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                    class="text-decoration-none btn btn-success m-1"><i class="ph ph-eye"></i>
                                </a>
                                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                    data-bs-target="#deleteContact{{ $contact->id }}">
                                    <i class="ph ph-trash"></i>
                                </button>
                                <div class="modal fade" id="deleteContact{{ $contact->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="h6"><span class="fw-bold">@lang('app.contact'):
                                                    </span>{{ $contact->name }}</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h1 class="modal-title fs-5">
                                                    <i class="ph-fill ph-warning text-warning"></i>
                                                    @lang('app.deleteConfirmation')
                                                </h1>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">@lang('app.close')</button>
                                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="ph ph-trash"></i>
                                                        @lang('app.delete')</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $contacts->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <script>
        // Dinamik alert oluşturma fonksiyonu
        function showAlert(type, message) {
            const alertContainer = document.getElementById('dynamic-alerts');
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
            alertDiv.setAttribute('role', 'alert');
            alertDiv.innerHTML = `
                <i class="ph ph-${type === 'success' ? 'check-circle' : 'x-circle'}"></i> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            alertContainer.appendChild(alertDiv);

            // Alert'i 5 saniye sonra otomatik kapat
            setTimeout(() => {
                alertDiv.classList.remove('show');
                alertDiv.classList.add('fade');
                setTimeout(() => alertDiv.remove(), 150);
            }, 5000);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.is-responded-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const id = this.getAttribute('data-id');
                    const isResponded = this.checked;

                    // Checkbox'ı geçici olarak devre dışı bırak
                    this.disabled = true;

                    // AJAX isteği
                    fetch('{{ route("admin.contacts.updateResponded") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id: id,
                            is_responded: isResponded
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showAlert('success', data.message);
                        } else {
                            showAlert('danger', data.message);
                            this.checked = !isResponded;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showAlert('danger', '{{ trans('app.error_occurred') }}');
                        this.checked = !isResponded;
                    })
                    .finally(() => {
                        this.disabled = false;
                    });
                });
            });
        });
    </script>
@endsection
    