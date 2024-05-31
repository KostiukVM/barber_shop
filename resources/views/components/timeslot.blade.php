
<form action="{{ route('service.booking') }}" method="POST">
@csrf
<div class="mb-3">
    <label for="service_date" class="form-label">Оберіть дату та час послуги:</label>
    <input type="datetime-local" class="form-control" id="service_date" name="service_date" required>
</div>
<button type="submit" class="btn btn-primary">Записатися</button>
</form>
