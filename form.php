<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форм</title>
    <style>
        :root {
  --primary: #7c3aed;
  --primary-hover: #571CB7FF;
  --secondary: #f59e0b;
  --error: #dc2626;
  --success: #10b981;
  --text: #1e293b;
  --text-light: #64748b;
  --bg: #f8fafc;
  --border: #e2e8f0;
  --radius-lg: 16px;
  --radius-md: 12px;
  --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
  --shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}

body {
  font-family: 'Inter', system-ui, sans-serif;
  max-width: 640px;
  margin: 2rem auto;
  padding: 2rem;
  color: var(--text);
  background: linear-gradient(135deg, #2EC95AFF 0%, #2EC95AFF 100%);
  line-height: 1.6;
}

.form-group {
  margin-bottom: 2rem;
  position: relative;
}

label {
  display: block;
  margin-bottom: 0.75rem;
  font-weight: 600;
  font-size: 0.95rem;
  color: var(--text);
  letter-spacing: -0.01em;
}

input,
select,
textarea {
  width: 100%;
  padding: 1rem 1.5rem;
  border: 2px solid var(--border);
  border-radius: var(--radius-md);
  background-color: white;
  font-size: 1rem;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  box-shadow: var(--shadow);
}

input:focus,
select:focus,
textarea:focus {
  border-color: var(--primary);
  outline: none;
  box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.2);
  transform: translateY(-2px);
}

textarea {
  min-height: 140px;
  resize: vertical;
}

select[multiple] {
  min-height: 160px;
  padding: 1rem;
  background-image: none;
}

/* Стили для кнопки (новый элемент) */
.button {
  display: inline-block;
  padding: 1rem 2rem;
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  color: white;
  font-weight: 600;
  font-size: 1rem;
  border: none;
  border-radius: var(--radius-md);
  cursor: pointer;
  box-shadow: var(--shadow);
  transition: all 0.3s ease;
  text-align: center;
  text-decoration: none;
  position: relative;
  overflow: hidden;
  z-index: 1;
}

.button:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-hover);
}

.button:active {
  transform: translateY(1px);
}

.button::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, var(--primary-hover) 0%, #e67e22 100%);
  opacity: 0;
  transition: opacity 0.3s ease;
  z-index: -1;
}

.button:hover::before {
  opacity: 1;
}

.error {
  border-color: var(--error) !important;
  animation: pulse 0.5s;
}

@keyframes pulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.02); }
}

.error-message {
  color: var(--error);
  font-size: 0.85rem;
  margin-top: 0.5rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.75rem;
  background-color: rgba(220, 38, 38, 0.05);
  border-radius: var(--radius-md);
}

.error-message::before {
  content: "❗";
}

.success {
  color: var(--success);
  background: linear-gradient(90deg, rgba(16, 185, 129, 0.1) 0%, transparent 100%);
  padding: 1.25rem;
  margin-bottom: 2rem;
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  gap: 1rem;
  border-left: 4px solid var(--success);
  box-shadow: var(--shadow);
}

.success::before {
  content: "✓";
  font-weight: bold;
  font-size: 1.25rem;
}

.radio-group {
  display: flex;
  gap: 1.5rem;
  margin: 1rem 0;
}

.radio-option {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  cursor: pointer;
  padding: 0.75rem 1rem;
  border-radius: var(--radius-md);
  transition: all 0.2s ease;
}

.radio-option:hover {
  background-color: rgba(124, 58, 237, 0.05);
}

.radio-option input {
  width: 18px;
  height: 18px;
  accent-color: var(--primary);
}

.checkbox-container {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  margin: 0.75rem 0;
  padding: 0.75rem 1rem;
  border-radius: var(--radius-md);
  transition: all 0.2s ease;
  cursor: pointer;
}

.checkbox-container:hover {
  background-color: rgba(124, 58, 237, 0.05);
}

.checkbox-container input[type="checkbox"] {
  width: 20px;
  height: 20px;
  accent-color: var(--primary);
  flex-shrink: 0;
}

.checkbox-container label {
  margin: 0;
  font-weight: 500;
  user-select: none;
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
    <div class="error-message">Необходимо подтверждение</div>
    <?php endif; ?>
</div>
            
            <div class="form-group">
                <button type="submit">Отправить</button>
            </div>
        </form>
    </div>
</body>
</html>
