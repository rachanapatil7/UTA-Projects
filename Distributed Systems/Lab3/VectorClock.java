/*Name: Rachana Naganagouda Patil
 * Student Id: 1001644227
 */

/*
 * Purpose: Implementation of Vector clocks
 *  
 */
public class VectorClock {

	private int[] clock;
	
	/*
	 * Input: Integer variables
	 * Output: None
	 * Purpose: Initialization of vector clock variables
	 *  
	 */

	public VectorClock(int a, int b, int c) {
		this.clock = new int[] { a, b, c };
	}
	
	/*
	 * Input: clock array 
	 * Output: None
	 * Purpose: Initialization of clock array variables
	 *  
	 */

	public VectorClock(String... clockArr) {
		this(Integer.parseInt(clockArr[0]), Integer.parseInt(clockArr[1]), Integer.parseInt(clockArr[2]));
	}
	
	/*
	 * Input: None
	 * Output: Integer array
	 * Purpose: Get the clock values from the array
	 *  
	 */

	public int[] getClock() {
		int[] local = new int[3];
		for (int i = 0; i < 3; i++) {
			local[i] = this.clock[i];
		}
		return local;
	}

	/*
	 * Input: Integer variables
	 * Output: None
	 * Purpose: Set values of vector clock variables
	 *  
	 */
	private void setClockAt(int index, int clock) {
		if (index >= 0 && index < 3) {
			this.clock[index] = clock;
		}
	}
	
	/*
	 * Input: Integer variables
	 * Output: None
	 * Purpose: Increment of clock variables while sending or receiving the values of the clock
	 *  
	 */
	
	public void incrementAt(int index) {
		if (index >= 0 && index < 3) {
			this.clock[index] ++;
		}
	}
	
	/*
	 * Input: Object of vector Clock
	 * Output: None
	 * Purpose: Get the values of the clock 
	 *  
	 */

	public VectorClock(VectorClock c) {
		if (c != null) {
			this.clock = new int[3];
			int[] old_clk = c.getClock();
			for (int i = 0; i < 3; i++) {
				this.clock[i] = old_clk[i];
			}
		}
	}
	
	/*
	 * Input: Objects of Vector clock c1 and c2
	 * Output: None
	 * Purpose: Initialization of vector clock variables
	 *  
	 */
	
	public static VectorClock updateClock(VectorClock c1, VectorClock c2) {

		if (c1 != null && c2 != null) {

			int[] c1Clock, c2Clock;
			c1Clock = c1.getClock();
			c2Clock = c2.getClock();

			for (int i = 0; i < 3; i++) {
				c1.setClockAt(i, Math.max(c1Clock[i], c2Clock[i]));
			}

			return new VectorClock(c1);
		}

		return null;
	}

}
