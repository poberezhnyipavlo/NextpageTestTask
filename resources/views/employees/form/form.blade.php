
<div class="form-group">
    <label for="">Фіо</label>
    <input type="text" class="form-control" name="fio" value="{{ $employee->fio ?? '' }}">
</div>
<div class="form-group">
    <label for="">Посада</label>
    <input type="text" class="form-control" name="position" value="{{ $employee->position ?? '' }}">
</div>

<div class="form-group">
    <label for="">Начальник</label>
    <select class="form-control" name="boss_id" id="boss_id">
        @foreach($bosses as $boss)
            <option value="{{ $boss->id ?? ''}}">
                {{ $boss->fio ?? ''}}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="">Зарплата</label>
    <input type="text" class="form-control" name="salary" value="{{ $employee->salary ?? '' }}">
</div>
<div class="form-group">
    <label for="">Дата прийому на роботу</label>
    <input type="date" class="form-control" name="work_start_at" value="{{ $employee->work_start_at ?? '' }}">
</div>
<div class="form-group">
    <label for="">Виберіть аватар</label>
    <input type="file" class="form-control" name="img">
</div>
<div class="form-group">
    <img src="{{ asset($employee->thubnaill) ?? ''}}" alt="">
</div>
<input type="submit" class="btn btn-primary">
