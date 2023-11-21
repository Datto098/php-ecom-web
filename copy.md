<?php
                                        $averageRate = $product["rates"]["average_rate"];

                                        if ($averageRate != null) {
                                            // Chuyển đổi giá trị trung bình thành số sao
                                            $numStars = round($averageRate);

                                            // Tạo chuỗi HTML dựa trên số sao
                                            $htmlStars = '<div class="rating">';
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $numStars) {
                                                    $htmlStars .= '<i class="fa fa-star"></i>';
                                                } else {
                                                    $htmlStars .= '<i class="fa fa-star-o"></i>';
                                                }
                                            }
                                        } else {
                                            $htmlStars = '<div class="rating">';
                                            for ($i = 1; $i <= 5; $i++) {
                                                $htmlStars .= '<i class="fa fa-star-o"></i>';
                                            }
                                        }

                                        $htmlStars .= '</div>';
                                        // In chuỗi HTML
                                        echo $htmlStars;
                                        ?>
