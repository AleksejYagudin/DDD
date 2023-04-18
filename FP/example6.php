<?php
declare(strict_types=1);
//Пример использование свертки списка для бизнес задач

class Product
{
    private string $title;
    private int $price;
    private string $category;

    /**
     * @param string $title
     * @param int $price
     * @param string $category
     */
    public function __construct(string $title, int $price, string $category)
    {
        $this->title = $title;
        $this->price = $price;
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }


}

$products = [
    new Product('Портвейн 777', 250, 'Вино'),
    new Product('Текала Olmeca Blanko', 2000, 'Крепкие напитки'),
    new Product('Водка пшеничная', 550, 'Крепкие напитки'),
    new Product('Балтика 9', 70, 'Пиво'),
    new Product('Дунклер Хирш', 470, 'Пиво'),
];

//Вычисление общей цены
class TotalPriceReducer {
    public function __invoke(int $total, Product $item): int
    {
        $itemPrice = $item->getPrice();
        $total += $itemPrice;
        return $total;
    }
}

$init1 = 0;
$reducer1 = new TotalPriceReducer();
$result1 = array_reduce($products, $reducer1, $init1);

echo $result1;
echo '<br>';

//Найдем более дорогой товар
class MostExpensiveProductReducer {
    public function __invoke(Product $mostExpensive, Product $item): Product
    {
        $itemPrice = $item->getPrice();
        if($itemPrice > $mostExpensive->getPrice()) {
            $mostExpensive = $item;
        }
        return $mostExpensive;
    }
}

$init2 = $products[0];
$reducer2 = new MostExpensiveProductReducer();
$result2 = array_reduce($products, $reducer2, $init2);

echo '<pre>';
print_r($result2);
echo '</pre>';
echo '<br>';

//Раскидываем наши товары по категориям

class CategoryReducer {
    public function __invoke(array $productsByCategory, Product $item): array
    {
        $category = $item->getCategory();
        if(!array_key_exists($category, $productsByCategory)) {
            $productsByCategory[$category] = [];
        }
        $productsByCategory[$category][] = $item;
        return $productsByCategory;
    }
}
$init3 = [];
$reducer3 = new CategoryReducer();
$result3 = array_reduce($products, $reducer3, $init3);

echo '<pre>';
print_r($result3);
echo '</pre>';

$test = function (string $str1, string $int1): string {
  return $str1.$int1;
};
$t=1;
$test('ddd', 'ffff');
$arr = [$t, $test];
echo '<pre>';
print_r($arr);
echo '</pre>';