<?php
class PC extends AbstractBasePC implements IViewer
{
    private $title;
    private $status;
    private $dataPublished;

   public function show()
   {
       // TODO: Implement show() method.
   }

   public function showAll()
   {
       $this->show();
   }

   function JsonSerializable()
   {
        $ar = [
            'title' => $this->title,
            'data' => $this->dataPublished
        ];
   }
}