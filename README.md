# skyeng code-review example

Для того чтобы провести качественный Code Review нужно не только видеть код, но и знать детали бизнес-задачи, которую этот код решает. В зависимости от различных предпосылок, таких как вероятность изменения, требования к устойчивости, срочность реализации и других, результат Code Review может отличаться кардинально. Кроме того, понимание решаемой задачи позволяет глубже вовлечь разработчика (ревьюера) в проект, улучшить понимание проекта в целом, и таким образом косвенно усилить контроль над кодовой базой.

Далее альтернативное решение выполняется, исходя из следующих предпосылок:

- код написан не для разовой операции и будет использоваться в продуктивной среде;
- данные из внешнего сервиса хорошо структурированы (могут быть преобразованы в объект заданной структуры по понятным правилам);
- маловероятно изменение лишь одного аспекта сервиса (например смена протокола с REST на GraphQL) при сохранении других его аспектов (формат данных, авторизация);
- существует вероятность, что в перспективе будет использован другой источник данных (другой сервис), при этом ключевой набор данных сохранится — другой сервис может отдавать данные в другом формате, но их также можно будет преобразовать в объект заданной ранее структуры по понятным правилам;
- в перспективе возможно одновременное использование нескольких источников данных;
- в будущем не исключены доработки этого кода, например в рамках поддержки или при поступлении новых требований;
- внешний сервис предоставляет единственный метод на получение данных, либо остальные методы в рамках данного проекта не интересны — эта предпосылка введена специально для того чтобы сократить объем альтернативного решения.