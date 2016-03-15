var src = './src';
var dest = './build';

module.exports = {
  less: {
    all: src + "/less/**/*.less",  //所有less
    src: src + "/less/*.less",   //需要编译的less
    dest: dest + "/css",     //输出目录
    settings: {     //编译less过程需要的配置，可以为空
    }
  }
}