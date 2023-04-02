<?php
declare(strict_types=1);

abstract class Document {
}

class Contract extends Document {
    //Для контракта важен город
    public string $city;

    public function __construct(string $city)
    {
        $this->city = $city;
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

}

class Notes extends Document {
    //Для заметок важен автор
    public string $owner;
    //Для отчета важны события
    public function __construct(string $owner)
    {
        $this->owner = $owner;
    }

}
/**
 * @param Document[] $documents
 * @return void
 */
function printDocument(array $documents): void {
    foreach ($documents as $document) {
        if($document instanceof Contract) {
            echo 'Контракт из города '. $document->city . '<br>';
        }
        if($document instanceof Report) {
            echo 'Отчет, количество событий '. count($document->events) . '<br>';
        }
    }
}

$documents = [
    new Contract('Москва'),
    new Report([1,2,3]),
    new Notes('Дмитрий')
];
printDocument($documents);
