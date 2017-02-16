/*
 * 给定一个整数N,那么N!的末尾有几个0呢？
 *
 * 分析：
 * ① 如果直接计算出N!的值,那么有可能会溢出；
 * ② N!=K*pow(10,M);如果K不能被10整除,那么M就是我们要得到的数字；
 * ③ N!=pow(2,x)*pow(3,y)*pow(5,z)··· (对N!进行质因数分解)，由于10=2*5;不难看出X>Z,所以M=Z;
 * */
#include <stdio.h>
int ret = 0;
int N;
int main(){

	printf("请输入参数N:");
	scanf("%d",&N);
	int i,j ;
	for(i=1;i<=N;i++){
		j=i;
		while(j%5==0){
			ret++;
			j/=5;
		}		
	}
	printf("%d! 的末尾有%d个0！\n",N,ret);
	return 0;
}
