@push('styles')
<style>
.article-form {
    max-width: 720px;
}

.form-group {
    margin-bottom: 24px;
}

.form-group label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #000;
    background: #fff;
    font-family: inherit;
    font-size: 14px;
    color: #111;
    border-radius: 0;
}

.form-control:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.08);
}

textarea.form-control {
    resize: vertical;
    line-height: 1.6;
}

select.form-control {
    appearance: none;
    background-image: linear-gradient(45deg, transparent 50%, #000 50%),
        linear-gradient(135deg, #000 50%, transparent 50%);
    background-position: calc(100% - 20px) center, calc(100% - 15px) center;
    background-size: 6px 6px, 6px 6px;
    background-repeat: no-repeat;
    padding-right: 40px;
    cursor: pointer;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 12px;
    margin-top: 6px;
}

/* Status radios styled as pill-toggle, consistent with .btn-pill language */
.status-radio-group {
    display: flex;
    gap: 10px;
    margin-top: 4px;
}

.status-radio {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 400;
    font-size: 14px;
    cursor: pointer;
    border: 1px solid #000;
    border-radius: 20px;
    padding: 8px 18px;
    transition: background 0.15s, color 0.15s;
}

.status-radio:has(input:checked) {
    background: #111;
    color: #fff;
}

.status-radio input[type="radio"] {
    accent-color: #111;
    cursor: pointer;
}

.status-radio:has(input:checked) input[type="radio"] {
    accent-color: #fff;
}

/* Form actions row */
.edit-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 32px;
    padding-top: 20px;
    border-top: 1px solid #ddd;
}

.submit-btn {
    background: #111;
    color: #fff;
    border: none;
    padding: 10px 24px;
    border-radius: 20px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
}

.submit-btn:hover {
    background: #333;
}

.cancel-btn {
    background: transparent;
    color: #111;
    border: 1px solid #111;
    padding: 10px 24px;
    border-radius: 20px;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
    display: inline-block;
}

.cancel-btn:hover {
    background: #f5f5f5;
}

@media (max-width: 768px) {
    .status-radio-group {
        flex-wrap: wrap;
    }
}
</style>
@endpush