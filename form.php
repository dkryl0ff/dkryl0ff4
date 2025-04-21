<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Анкета</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    max-width: 650px;
    margin: 0 auto;
    padding: 25px;
    background-color: #f5f7fa;
    color: #333;
}

.form-group {
    margin-bottom: 18px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #2c3e50;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    box-sizing: border-box;
    font-size: 15px;
    background-color: #fff;
    transition: border-color 0.3s ease;
}

input:focus, select:focus, textarea:focus {
    border-color: #6b7280;
    outline: none;
    box-shadow: 0 0 0 2px rgba(107, 114, 128, 0.1);
}

textarea {
    height: 110px;
    resize: vertical;
}

select[multiple] {
    height: 130px;
}

.error {
    border-color: #ef4444;
    background-color: #fef2f2;
}

.error-message {
    color: #ef4444;
    font-size: 0.85em;
    margin-top: 6px;
}

.success {
    color: #10b981;
    margin-bottom: 18px;
    padding: 12px;
    background: #ecfdf5;
    border: 1px solid #10b981;
    border-radius: 6px;
    font-size: 0.95em;
}

.radio-group {
    display: flex;
    gap: 20px;
    padding: 8px 0;
}

.radio-option {
    display: flex;
    align-items: center;
    gap: 8px;
}

.checkbox-container {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 0;
}

.checkbox-container input[type="checkbox"] {
    width: auto;
    margin: 0;
    transform: scale(1.2);
}

.checkbox-container label {
    margin-bottom: 0;
    font-weight: 500;
}

button {
    background-color: #4f46e5;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #4338ca;
}
    </style>
</head>
<body>
    <div class="form-container">
        
        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $message): ?>
                <?= $message ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="full_name">ФИО*</label>
                <input type="text" id="full_name" name="full_name" 
                       class="<?= $errors['full_name'] ? 'error' : '' ?>" 
                       value="<?= htmlspecialchars($values['full_name']) ?>">
                <?php if ($errors['full_name']): ?>
                <div class="error-message">Допустимы только буквы, пробелы и дефисы (2-150 символов)</div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="phone">Телефон*</label>
                <input type="tel" id="phone" name="phone" 
                       class="<?= $errors['phone'] ? 'error' : '' ?>" 
                       value="<?= htmlspecialchars($values['phone']) ?>">
                <?php if ($errors['phone']): ?>
                <div class="error-message">Введите 10-15 цифр, можно с + в начале</div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" id="email" name="email" 
                       class="<?= $errors['email'] ? 'error' : '' ?>" 
                       value="<?= htmlspecialchars($values['email']) ?>">
                <?php if ($errors['email']): ?>
                <div class="error-message">Введите корректный email</div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="birth_date">Дата рождения*</label>
                <input type="date" id="birth_date" name="birth_date" 
                       class="<?= $errors['birth_date'] ? 'error' : '' ?>" 
                       value="<?= htmlspecialchars($values['birth_date']) ?>">
                <?php if ($errors['birth_date']): ?>
                <div class="error-message">Дата должна быть в прошлом</div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Пол*</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="male" name="gender" value="male" 
                               <?= $values['gender'] === 'male' ? 'checked' : '' ?>
                               class="<?= $errors['gender'] ? 'error' : '' ?>">
                        <label for="male">Мужской</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="female" name="gender" value="female" 
                               <?= $values['gender'] === 'female' ? 'checked' : '' ?>
                               class="<?= $errors['gender'] ? 'error' : '' ?>">
                        <label for="female">Женский</label>
                    </div>
                </div>
                <?php if ($errors['gender']): ?>
                <div class="error-message">Укажите пол</div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="languages">Любимые языки программирования*</label>
                <select id="languages" name="languages[]" multiple 
                        class="<?= $errors['languages'] ? 'error' : '' ?>">
                    <?php
                    $allLanguages = [
                        1 => 'Pascal', 2 => 'C', 3 => 'C++', 4 => 'JavaScript',
                        5 => 'PHP', 6 => 'Python', 7 => 'Java', 8 => 'Haskell',
                        9 => 'Clojure', 10 => 'Prolog', 11 => 'Scala', 12 => 'Go'
                    ];
                    foreach ($allLanguages as $id => $name): ?>
                        <option value="<?= $id ?>" 
                            <?= in_array($id, $values['languages']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if ($errors['languages']): ?>
                <div class="error-message">Выберите хотя бы один язык</div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="biography">Биография</label>
                <textarea id="biography" name="biography"><?= htmlspecialchars($values['biography']) ?></textarea>
            </div>

           <div class="form-group">
    <div class="checkbox-container">
        <input type="checkbox" id="contract_agreed" name="contract_agreed" value="1"
               <?= $values['contract_agreed'] ? 'checked' : '' ?>
               class="<?= $errors['contract_agreed'] ? 'error' : '' ?>">
        <label for="contract_agreed">С контрактом ознакомлен(а)*</label>
    </div>
    <?php if ($errors['contract_agreed']): ?>
    <div class="error-message">Необходимо подтвердить ознакомление</div>
    <?php endif; ?>
</div>
            
            <div class="form-group">
                <button type="submit">Отправить</button>
            </div>
        </form>
    </div>
</body>
</html>