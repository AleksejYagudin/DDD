<?php
declare(strict_types=1);

abstract class Document {
    abstract public function getTitle(): string;
}

class Contract extends Document {
    //Для контракта важен город
    public string $city;
    public function __construct(string $city)
    {
        $this->city = $city;
    }
    public function getTitle(): string
    {
        return 'Контракт из города '. $this->city;
    }

}

class Report extends Document {
    //Для контракта важен город
    public array $events;
    //Для отчета важны события
    public function __construct(array $events)
    {
        $this->events = $events;
    }
    public function getTitle(): string
    {
        return 'Отчет, количество событий '. count($this->events);
    }

}
class Notes extends Document {
    //Для заметок важен автор
    public string $owner;
    //Для отчета важны события
    public function __construct(string $owner)
    {
        $this->owner = $owner;
    }
    public function getTitle(): string
    {
        return 'Заметки пользователя '. $this->owner;
    }

}
/**
 * @param Document[] $documents
 * @return void
 */
function printDocument(array $documents): void {
    foreach ($documents as $document) {
        echo $document->getTitle().'<br>';
    }
}

$documents = [
    new Contract('Москва'),
    new Report([1,2,3]),
    new Notes('Дмитрий')
];
printDocument($documents);
