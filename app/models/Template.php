<?php

class Template
{
    public function view($view, $data)
    {
        extract($data);
        include BASE_URL . 'app/views/' . $view . '.php';
    }

    public function render($view, $data)
    {
        // Bật buffering
        ob_start();
        extract($data);
        include BASE_URL . 'app/views/blocks/' . $view . '.php';

        // Chuyển thông tin đọc được thành dạng chuỗi
        return ob_get_clean();
    }
}
