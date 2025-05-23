@extends('admin.layouts.app')
@section('title') @lang('app.contacts') @endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="row justify-content-center mx-0 my-4">
            <div class="col-sm-11 col-md-9 col-lg-8 d-flex justify-content-between align-items-center my-3">
                <div class="h3 mb-3">
                    <a href="{{ route('admin.contacts.index') }}"><i class="bi-arrow-left-circle"></i></a>
                    @lang('app.contact') : {{ $contact->name }}
                </div>
                <div>
                    <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                        data-bs-target="#deleteContact{{ $contact->id }}">
                        <i class="ph ph-trash"></i> @lang('app.delete')
                    </button>
                </div>
            </div>
            <div class="col-sm-11 col-md-9 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4 class="mb-2">@lang('app.info')</h4>
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
                            </div>
                        </div>

                        <h4 class="mt-3 mb-2">@lang('app.contact')</h4>
                        <table class="table table-striped table-hover table-bordered table-sm">
                            <tr>
                                <th><i class="ph ph-envelope"></i> @lang('app.email')</th>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <th><i class="ph ph-phone"></i> @lang('app.phoneNumber')</th>
                                <td>{{ $contact->phone_number ?: '-' }}</td>
                            </tr>
                        </table>

                        <h4 class="mt-3 mb-2">@lang('app.message')</h4>
                        <p class="card-text">{{ $contact->message ?: '-' }}</p>

                        <h4 class="mt-3 mb-2">@lang('app.device')</h4>
                        <table class="table table-striped table-hover table-bordered table-sm">
                            <tr>
                                <th>@lang('app.ipAddress')</th>
                                <td>{{ $contact->ip_address ?: '-' }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.userAgent')</th>
                                <td>{{ $contact->user_agent ?: '-' }}</td>
                            </tr>
                        </table>

                        <h4 class="mt-3 mb-2">@lang('app.status')</h4>
                        <div class="form-check form-switch">
                            <input class="form-check-input is-responded-checkbox" type="checkbox" 
                                   name="isResponded" role="switch" 
                                   id="isResponded-{{ $contact->id }}" 
                                   data-id="{{ $contact->id }}"
                                   {{ $contact->is_responded ? 'checked' : '' }}>
                            <label class="form-check-label" for="isResponded-{{ $contact->id }}">
                                {{ $contact->is_responded ? trans('app.responded') : trans('app.notResponded') }}
                            </label>
                        </div>

                        <h4 class="mt-3 mb-2">@lang('app.others')</h4>
                        <table class="table table-striped table-bordered table-hover table-sm small text-secondary">
                            <tr>
                                <th>@lang('app.createdBy')</th>
                                <td>{{ $contact->created_by ?: '-' }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.createdAt')</th>
                                <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.updatedAt')</th>
                                <td>{{ $contact->updated_at->format('d M Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteContact{{ $contact->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="h6"><span class="fw-bold">@lang('app.contact'):
                            </span>{{ $contact->name }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1 class="modal-title fs-5">
                            <i class="ph-fill ph-warning text-warning"></i> @lang('app.deleteConfirmation')
                        </h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('app.close')</button>
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="ph ph-trash"></i>
                                @lang('app.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showAlert(type, message) {
            const alertContainer = document.getElementById('dynamic-alerts');
            alertContainer.innerHTML = '';
            
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
            alertDiv.setAttribute('role', 'alert');
            alertDiv.innerHTML = `
                <i class="ph ph-${type === 'success' ? 'check-circle' : 'x-circle'}"></i> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            alertContainer.appendChild(alertDiv);

            setTimeout(() => {
                alertDiv.classList.remove('show');
                alertDiv.classList.add('fade');
                setTimeout(() => alertDiv.remove(), 150);
            }, 5000);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const checkbox = document.querySelector('.is-responded-checkbox');
            const label = document.querySelector('label[for="isResponded-{{ $contact->id }}"]');

            if (checkbox && label) {
                checkbox.addEventListener('change', function () {
                    const id = this.getAttribute('data-id');
                    const isResponded = this.checked;

                    this.disabled = true;

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
                            label.textContent = isResponded ? '{{ trans('app.responded') }}' : '{{ trans('app.notResponded') }}';
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
            }
        });
    </script>
@endsection

    