<?php


class Cart
{
    private array $items = [];

    //TODO Skriv getter för items

    public function getItems() {
        return $this->items;
    }

    /*
     Skall lägga till en produkt(cartitem) i kundvagnen genom att
     skapa ett nytt cartItem och lägga till i $items array.
     Metoden skall returnera detta cartItem.

     VG: Om produkten redan finns i kundvagnen
     skall istället quantity på cartitem ökas.
     */
    public function addProduct($product, $quantity)
    {
       
        $cartItem = new CartItem($product, 1);
        array_push($this->items, $cartItem);

        return $cartItem;

    }


    //Skall ta bort en produkt ur kundvagnen (använd unset())
    public function removeProduct($product)
    {
         unset($this -> items[0]);
         return $this -> items;


    }

    //Skall returnera totala antalet produkter i kundvagnen
    //OBS: Ej antalet unika produkter
    public function getTotalQuantity()
    {   
        $i = 0;
        foreach($this->items as $item) {
            $i = $i + $item->getQuantity();
        }

        return $i;

        
    }

    //Skall räkna ihop totalsumman för alla produkter i kundvagnen
    //VG: Tänk på att ett cartitem kan ha olika quantity
     public function getTotalSum()
     {

        $totalPriceSum = 0;

        foreach($this->items as $item) {

            $totalPriceSum = $totalPriceSum + $item->getProduct()->getPrice() * $item->getQuantity();

        
        };

        return $totalPriceSum;
        
     }
}
