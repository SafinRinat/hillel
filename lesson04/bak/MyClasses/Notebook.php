<?php
class Notebook extends AbstractBasePC implements IViewer, JsonSerializable
{
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

    }

}