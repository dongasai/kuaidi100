<?php

namespace HarriesCC\Kuaidi100\Tool;

class Csv2Const
{
    static public function to()
    {
        // 20230816175308.csv
        $row = 1;
        $array = [];
        if (($handle = fopen(dirname(__DIR__) . DIRECTORY_SEPARATOR . "doc/new.csv", "r")) !== FALSE) {

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                $line = [];
                for ($c = 0; $c < $num; $c++) {
                    $line[] = $data[$c];
                }
                $array [] = $line;
            }
            fclose($handle);
        }
        self::to2($array);
    }

    static private function to2($list)
    {
        $china = [];
        $chinaConstString = '';
        $gpost = [];
        $gpostConstString = '';

        $gtrans = [];
        $gtransConstString = '';

        $cString = '国内运输商';
        $gpString = '国际邮政';
        $gtString = '国际运输商';
        foreach ($list as $item) {
            if ($item[2] == $cString) {
                $china[] = [
                    'name' => $item[0],
                    'no' => $item[1],
                    'type' => $item[2]
                ];
                $chinaConstString .= self::constString($item[1], $item[0]);
            }
            if ($item[2] == $gpString) {
                $gpost[] = [
                    'name' => $item[0],
                    'no' => $item[1],
                    'type' => $item[2]
                ];
                $gpostConstString .= self::constString($item[1], $item[0]);
            }
            if ($item[2] == $gtString) {
                $gtrans[] = [
                    'name' => $item[0],
                    'no' => $item[1],
                    'type' => $item[2]
                ];
                $gtransConstString .= self::constString($item[1], $item[0]);

            }
        }

        # 国内运输商
        file_put_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src/Constant/China.php', self::chinaString($chinaConstString));

        # 国际邮政
        file_put_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src/Constant/GlobalPost.php', self::gpString($gpostConstString));

        # 国际运输商
        file_put_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src/Constant/GlobalTransport.php', self::gtString($gtransConstString));
        # 所有的
        file_put_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src/Constant/All.php', self::allString($chinaConstString.$gtransConstString.$gpostConstString));
    }


    static private function constString($name, $comment)
    {
        $name2 = self::no2Name($name);
        $string = "

    /**
     * $comment
     */
    const $name2 = '$name';";
        return $string;


    }

    /**
     * 获取国内运输商的常量类字符串
     *
     * @param string $constString
     * @return string
     */
    static private function chinaString(string $constString)
    {
        $s = <<<aaa
<?php

namespace HarriesCC\Kuaidi100\Constant;

/**
 * 国内运输商
 *
 */
class China
{

$constString

}

aaa;


        return $s;

    }


    /**
     * 获取国际邮政 的 类字符串
     * @param string $constString
     * @return string
     */
    static private function gpString(string $constString): string
    {

        $s = <<<aaa
<?php

namespace HarriesCC\Kuaidi100\Constant;



/**
 * 国际邮政
 *
 */
class GlobalPost
{

$constString

}
aaa;


        return $s;
    }

    /**
     * 获取 国际运输商 的类字符串
     * @param string $constString
     * @return string
     */
    static private function gtString(string $constString): string
    {

        $s = <<<aaa
<?php

namespace HarriesCC\Kuaidi100\Constant;



/**
 * 国际运输商
 *
 */
class GlobalTransport
{

$constString

}

aaa;


        return $s;
    }


    /**
     * 获取 国际运输商 的类字符串
     * @param string $constString
     * @return string
     */
    static private function allString(string $constString): string
    {

        $s = <<<aaa
<?php

namespace HarriesCC\Kuaidi100\Constant;



/**
 * 所有的
 *
 */
class All
{

$constString

}

aaa;


        return $s;
    }
    /**
     * 编号 转 常量名字
     * @param $name
     * @return string
     */
    static private function no2Name($name)
    {
        $name2 = strtoupper($name);
        $first = substr($name2, 0, 1);
        $list = [
            "L", "Y", "E", "S", "S", "W", "L", "Q", "B", "J"
        ];
        if (is_numeric($first)) {

            $name2 = $list[$first] . $name2;
        }
        return $name2;
    }

}